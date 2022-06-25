<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Attemp;
use App\Models\User;
use App\Models\Notification;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Setting;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;


class QuizeController extends Controller
{


    /**
     * count student quize fail and pass
     * 
     * @param int $subject_id
     * @param int $chapter_id
     * @param int $unit_id
     * 
     * @return int $fail_count
     */
    protected function countFailPass($subject_id, $chapter_id, $unit_id)
    {

        $previous_quize = Attemp::where('subject_id', $subject_id)->where('chapter_id', $chapter_id)->where('unit_id', $unit_id)->where('user_id', Auth::user()->id)->first();
        $fail_count = 0;
        if ($previous_quize == NULL) {
            return  $fail_count = 0;
        } else {
            $marks =  json_decode($previous_quize->mark);
            foreach ($marks as $mark) {
                if ($mark->status == 'fail') {
                    $fail_count++;
                } else {
                    $fail_count = 0;
                }
            }
            return $fail_count;
        }
    }

    /**
     * create attemp or update attemp
     * 
     * @param int $subject_id
     * @param int $chapter_id
     * @param int $unit_id 
     * 
     * @return Object of json
     */
    protected function attempCreateOrUpdate($subject_id, $chapter_id, $unit_id)
    {
        $attemp = Attemp::where('user_id', Auth::user()->id)->where('subject_id', $subject_id)->where('chapter_id', $chapter_id)->where('unit_id', $unit_id)->first();

        //findout current date time
        $current_date_time = Date("Y-m-d h:i:s");
        $start_time =  strtotime($current_date_time);

        if (is_null($attemp)) {

            $attemp = new Attemp();
            $attemp->user_id = Auth::user()->id;
            $attemp->subject_id = $subject_id;
            $attemp->chapter_id =  $chapter_id;
            $attemp->unit_id = $unit_id;
            $attemp->attemp++;
            $attemp->start_time = $start_time;
            $attemp->save();
            return response()->json([
                'status' => 200
            ]);
        } else {
            $attemp->attemp++;
            $attemp->start_time = $start_time;
            $attemp->save();
            return response()->json([
                'status' => 200
            ]);
        }
    }

    /**
     * start the quize and create or update attemp table 
     * 
     * @param \Illuminate\Http\Request
     * 
     * @return Object of Json
     * 
     */
    public function startQuize(Request $request)
    {
        $subject_id =  (int)$request->subjectId;
        $chapter_id =  (int)$request->chapterId;
        $unit_id =  (int)$request->unitId;

        $setting = Setting::where('subject_id', $subject_id)->where('chapter_id', $chapter_id)->where('unit_id', $unit_id)->where('user_id', Auth::user()->id)->first();

        if (!is_null($setting)) {
            if ($setting->status == 1) {
                return response()->json([
                    'status' => 400
                ]);
            } else {
                return $this->attempCreateOrUpdate($subject_id, $chapter_id, $unit_id);
            }
        } else {
            return $this->attempCreateOrUpdate($subject_id, $chapter_id, $unit_id);
        }
    }

    /**
     * ans the single question of quiz
     * 
     * @param \Illuminate\Http\Request
     * 
     * @return Boolean
     * 
     */
    public function quizeSubmit(Request $request)
    {
        $unit_id = (int) $request->unitId;
        $subject_id = (int) $request->subjectId;
        $chapter_id = (int) $request->chapterId;
        $question_id = (int) $request->question;

        $question = Quiz::where('user_id', Auth::user()->id)->where('unit_id', $unit_id)->where('question', $question_id)->first();
        if (!is_null($question)) {
            $quiz = Quiz::where('user_id', Auth::user()->id)->where('unit_id', $unit_id)->where('question', $question_id)->first();
            $quiz->answer = $request->answer;
            $quiz->save();
            return "quesiont ans updated";
        } else {
            $quiz = new Quiz();
            $quiz->user_id = Auth::user()->id;
            $quiz->subject_id = $subject_id;
            $quiz->chapter_id = $chapter_id;
            $quiz->unit_id = $unit_id;
            $quiz->question = $request->question;
            $quiz->answer = $request->answer;
            $quiz->correct_ans = $request->correctAns;
            $quiz->save();
            return "question save successfully";
        }
    }

    /**
     * complete the quiz and calculate the quize result,quiz status also time spend of quize
     * 
     * @param \Illuminate\Http\Request
     * 
     * @return Array
     */
    public function completeQuize(Request $request)
    {

        $quiz_status = [];
        $subject_id =  (int) $request->subjectId;
        $chapter_id =  (int) $request->chapterId;
        $unit_id =  (int) $request->unitId;

        //findout current date time
        $current_date_time = Date("Y-m-d h:i:s");
        $end_time =  strtotime($current_date_time);

        //calculate pass mark of quize
        $quiz = Quiz::where('user_id', Auth::user()->id)->where('subject_id', $subject_id)->where('chapter_id', $chapter_id)->where('unit_id', $unit_id)->get();
        $total_question = count($quiz);
        $pass_mark = 0.8 * $total_question;

        //calculate quiz score
        $quize_score = 0;
        foreach ($quiz as $value) {
            if ($value->correct_ans == $value->answer) {
                $quize_score++;
            }
        }

        //save quize score in the attemp table
        $attemp = Attemp::where('user_id', Auth::user()->id)->where('subject_id', $subject_id)->where('chapter_id', $chapter_id)->where('unit_id', $unit_id)->first();
        //make object of quize result and save into attemp table

        $quize_results = [];

        if (!is_null($attemp->mark)) {
            $quize_results = json_decode($attemp->mark);
        }

        $q_result['total_mark'] = $total_question;
        $q_result['pass_mark'] = round($pass_mark, 1);
        $q_result['score'] = $quize_score;
        $q_result['status'] = $quize_score >= $pass_mark ? 'pass' : 'fail';

        array_push($quize_results, $q_result);

        $attemp->mark =  json_encode($quize_results);
        $attemp->end_time = $end_time;
        $attemp->save();

        //deceside student fail or pass
        if ($quize_score >= $pass_mark) {
            $quiz_status[] = 'passed';
        } else {
            $quiz_status[] = 'failed';
        }

        //calculate total time spend for single quize
        $attemp = Attemp::where('user_id', Auth::user()->id)->where('subject_id', $subject_id)->where('chapter_id', $chapter_id)->where('unit_id', $unit_id)->first();
        $start_time = $attemp->start_time;
        $end_time = $attemp->end_time;
        $diff = $attemp->end_time - $start_time;
        $total_time_spend =  gmdate("H:i:s", $diff);

        //return array of quiz information
        $quiz_status[] = $total_question;
        $quiz_status[] = $quize_score;
        $quiz_status[] = $total_time_spend;

        //send notification to teacher
        $fail_count = 0;
        $notification = Attemp::where('user_id', Auth::user()->id)->where('subject_id', $subject_id)->where('chapter_id', $chapter_id)->where('unit_id', $unit_id)->first();

        if (!is_null($notification->mark)) {
            $total_attemps = json_decode($notification->mark);
            foreach ($total_attemps as $attemp) {
                if ($attemp->status == 'fail') {
                    $fail_count++;
                }
            }

            //save data to notification table
            if ($fail_count >= 3) {

                $subject = Subject::where('subject_id', $subject_id)->first();
                $user = User::where('id', Auth::user()->id)->first();

                $notification = new Notification();
                $notification->notify_to = Auth::user()->id;
                $notification->title = 'Student failed in three times';
                $notification->message = $user->first_name . ' ' . $user->last_name . ' fail in ' . $subject->name;
                $notification->save();
            }
        }


        //count total fail if value is 3 or greater then insert data into setting table(block user)

        $total_fail =  $this->countFailPass($subject_id, $chapter_id, $unit_id);
        if ($total_fail >= 3) {

            $setting = Setting::where('subject_id', $subject_id)->where('chapter_id', $chapter_id)->where('unit_id', $unit_id)->where('user_id', Auth::user()->id)->first();
            if (!is_null($setting)) {
                $setting->status = 1;
                $setting->save();
            } else {
                $setting = new Setting();
                $setting->subject_id = $subject_id;
                $setting->chapter_id = $chapter_id;
                $setting->unit_id = $unit_id;
                $setting->user_id = Auth::user()->id;
                $setting->status = 1;
                $setting->save();
            }
        }

        return $quiz_status;
    }

    /**
     * delete the previous quize data when user try to attend same quize again
     * 
     * @param \Illuminate\Http\Request
     * 
     * @return Boolean
     * 
     */
    public function deleteQuize(Request $request)
    {

        $subject_id =  (int) $request->subjectId;
        $chapter_id =  (int) $request->chapterId;
        $unit_id =  (int) $request->unitId;

        $setting = Setting::where('subject_id', $subject_id)->where('chapter_id', $chapter_id)->where('unit_id', $unit_id)->where('user_id', Auth::user()->id)->first();

        if (!is_null($setting)) {
            if ($setting->status == 1) {
                return response()->json([
                    'status' => 400
                ]);
            } else {

                //findout current date time
                $current_date_time = Date("Y-m-d h:i:s");
                $start_time =  strtotime($current_date_time);

                $quizes = Quiz::where('user_id', Auth::user()->id)->where('subject_id', $subject_id)->where('chapter_id', $chapter_id)->where('unit_id', $unit_id)->get();

                $attemp = Attemp::where('user_id', Auth::user()->id)->where('subject_id', $subject_id)->where('chapter_id', $chapter_id)->where('unit_id', $unit_id)->first();
                $attemp->attemp++;
                $attemp->start_time = $start_time;
                $attemp->save();

                $quize_ids = [];
                foreach ($quizes as $quize) {
                    $quize = Quiz::find($quize->id)->delete();
                }

                return response()->json([
                    'status' => 200
                ]);
            }
        } else {
            //  findout current date time
            $current_date_time = Date("Y-m-d h:i:s");
            $start_time =  strtotime($current_date_time);

            $quizes = Quiz::where('user_id', Auth::user()->id)->where('subject_id', $subject_id)->where('chapter_id', $chapter_id)->where('unit_id', $unit_id)->get();

            $attemp = Attemp::where('user_id', Auth::user()->id)->where('subject_id', $subject_id)->where('chapter_id', $chapter_id)->where('unit_id', $unit_id)->first();
            $attemp->attemp++;
            $attemp->start_time = $start_time;
            $attemp->save();

            $quize_ids = [];
            foreach ($quizes as $quize) {
                $quize = Quiz::find($quize->id)->delete();
            }

            return response()->json([
                'status' => 200
            ]);
        }
    }

    /**
     * get total quesion of quize for specific unit 
     *
     * @param \Illuminate\Http\Request
     *
     * @return int $toal_question
     */
    public function totalQuestionOfQuiz(Request $request)
    {
        $unit_id =  (int)$request->unitId;
        $subject_id =  (int)$request->subjectId;
        $chapter_id =  (int)$request->chapterId;

        $total_question = Question::where('subject_id', $subject_id)->where('chapter_id', $chapter_id)->where('unit_id', $unit_id)->get();
        return count($total_question);
    }
}
