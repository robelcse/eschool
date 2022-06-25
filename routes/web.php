<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChapterlessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminStaffsController;
use App\Http\Controllers\MetarialController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Users\FrontendController;
use App\Http\Controllers\Users\MysubjectController;
use App\Http\Controllers\UnitController;

use App\Http\Controllers\Student\QuizeController;

use App\Http\Controllers\Student\SettingController as SettingController1;
use App\Http\Controllers\Admin\SettingController as SettingController2;


//dashboard
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Teacher\DashboardController as TeacherDashboard;
use App\Http\Controllers\Student\DashboardController as StudentDashboard;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
})->name('login');

/**
 * -----------------------------------------------------------------
 *  Aamin
 * -----------------------------------------------------------------
 * 
 * 
 */

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [AdminDashboard::class, 'dashboard'])->name('dashboard');

    //student module
    Route::get('/student/all', [StudentController::class, 'studentList'])->name('student.list');
    Route::get('/student/approve/{student_id}', [StudentController::class, 'approveStudent'])->name('student.approve');
    Route::get('/student/create', [StudentController::class, 'createStudentByAdmin'])->name('student.create');
    Route::post('/student/store', [StudentController::class, 'storeStudentByAdmin'])->name('student.store');
    Route::delete('/student/{student_id}/delete', [StudentController::class, 'deleteStudent'])->name('student.delete');

    //teacher module
    Route::get('/teacher/all', [TeacherController::class, 'teacherList'])->name('teacher.list');
    Route::get('/teacher/approve/{teacher_id}', [TeacherController::class, 'approveTeacherbyAdmin'])->name('teacher.approve');
    Route::get('/teacher/create', [TeacherController::class, 'createTeacherByAdmin'])->name('teacher.create');
    Route::post('/teacher/store', [TeacherController::class, 'storeTeacherByAdmin'])->name('teacher.store');
    Route::delete('/teacher/{teacher_id}/delete', [TeacherController::class, 'deleteStudent'])->name('student.delete');

    //subject module
    Route::get('/subjects', [SubjectController::class, 'getAllSubject'])->name('subjects');
    Route::get('/subject/create', [SubjectController::class, 'getCreatePage'])->name('subject-create-page');
    Route::post('/subject/create', [SubjectController::class, 'store'])->name('subject-create');
    Route::get('/subject/approve/{subject_id}', [SubjectController::class, 'subjectApproveByAdmin'])->name('subject.approve');
    Route::delete('/subject/{subject_id}/delete', [SubjectController::class, 'subjectDelete'])->name('subject.delete');

    //grade crate and show grade list
    Route::get('/subject/{subject}/grade', [SubjectController::class, 'getAllGradesOfSubjects'])->name('subject-grades');
    Route::get('/subject/grade/{subject}/create', [SubjectController::class, 'getCreateGradePage'])->name('get-grade-create-page');
    Route::post('/subject/grade/create/{subject}', [SubjectController::class, 'storeSubjectWiseGrade'])->name('post-grade-create-page');

    //chapter create and show chapter list
    Route::get('/subject/grade/chapter/{subject}/{grade}', [SubjectController::class, 'getAllChaptersOfGradeBySubject'])->name('subject-grade-chapter');
    Route::get('/subject/grade/chapter/{subject}/{grade}/create', [SubjectController::class, 'chapterCreatePage'])->name('chapter-create-page');
    Route::post('/subject/grade/chapter/{subject}/{grade}/create', [SubjectController::class, 'storeChapterByGradeWise'])->name('store-chapter');
    Route::delete('/subject/grade/chapter/{chapter}/delete', [SubjectController::class, 'deleteChapter'])->name('delete-chapte');
    Route::get('/chapter/approve/{chapter_id}', [SubjectController::class, 'chapterApproveByAdmin'])->name('chapter.approve');

    //unit create and show unit list
    Route::get('/subject/grade/chapter/unit/{subject}/{grade}/{chapter}', [UnitController::class, 'index'])->name('unit.index');
    Route::get('/subject/grade/chapter/unit/{subject}/{grade}/{chapter}/create', [UnitController::class, 'create'])->name('unit.create');
    Route::post('/unit/store', [UnitController::class, 'store'])->name('unit.store');
    Route::get('/unit/approve/{unit_id}', [UnitController::class, 'unitApproveByAdmin'])->name('unit.approve');
    Route::delete('/unit/{unit_id}/delete', [UnitController::class, 'destroy'])->name('unit.delete');

    //metarial
    Route::get('/subject/chapter/unit/metarial/{subject}/{grade}/{chapter}/{unit}', [MetarialController::class, 'index'])->name('metarial.index');
    Route::get('/subject/chapter/unit/metarial/{subject}/{grade}/{chapter}/{unit}/create', [MetarialController::class, 'createMaterial'])->name('metarial.create');
    Route::post('/subject/chapter/unit/metarial/create', [MetarialController::class, 'storeChapterWiseMetarial'])->name('metarial.store');

    Route::post('/update-profile', [DashboardController::class, 'updateProfile'])->name('updateProfile');
});



/**
 * -----------------------------------------------------------------
 *  Teacher
 * -----------------------------------------------------------------
 * 
 * 
 */

Route::group(['prefix' => 'teacher', 'as' => 'teacher.', 'middleware' => ['auth', 'teacher']], function () {
    Route::get('/dashboard', [TeacherDashboard::class, 'dashboard'])->name('dashboard');

    Route::get('/student/all', [StudentController::class, 'studentList'])->name('student.list');
    Route::get('/student/approve/{student_id}', [StudentController::class, 'approveStudent'])->name('student.approve');
    Route::get('/student/create', [StudentController::class, 'createStudentByAdmin'])->name('student.create');
    Route::post('/student/store', [StudentController::class, 'storeStudentByAdmin'])->name('student.store');
    Route::delete('/student/{student_id}/delete', [StudentController::class, 'deleteStudent'])->name('student.delete');

    Route::get('/teacher/all', [TeacherController::class, 'teacherList'])->name('teacher.list');
    Route::get('/teacher/approve/{teacher_id}', [TeacherController::class, 'approveTeacherbyTeacher'])->name('teacher.approve');
    Route::get('/teacher/create', [TeacherController::class, 'createTeacherByAdmin'])->name('teacher.create');
    Route::post('/teacher/store', [TeacherController::class, 'storeTeacherByAdmin'])->name('teacher.store');
    Route::delete('/teacher/{teacher_id}/delete', [TeacherController::class, 'deleteStudent'])->name('student.delete');

    //subject module
    //subject create and show subject list
    Route::get('/subjects', [SubjectController::class, 'getAllSubject'])->name('subjects');
    Route::get('/subject/create', [SubjectController::class, 'getCreatePage'])->name('subject-create-page');
    Route::post('/subject/create', [SubjectController::class, 'store'])->name('subject-create');
    Route::get('/subject/approve/{subject_id}', [SubjectController::class, 'subjectApproveByTeacher'])->name('subject.approve');


    //grade crate and show grade list
    Route::get('/subject/{subject}/grade', [SubjectController::class, 'getAllGradesOfSubjects'])->name('subject-grades');
    Route::get('/subject/grade/{subject}/create', [SubjectController::class, 'getCreateGradePage'])->name('get-grade-create-page');
    Route::post('/subject/grade/create/{subject}', [SubjectController::class, 'storeSubjectWiseGrade'])->name('post-grade-create-page');

    //chapter create and show chapter list
    Route::get('/subject/grade/chapter/{subject}/{grade}', [SubjectController::class, 'getAllChaptersOfGradeBySubject'])->name('subject-grade-chapter');
    Route::get('/subject/grade/chapter/{subject}/{grade}/create', [SubjectController::class, 'chapterCreatePage'])->name('chapter-create-page');
    Route::post('/subject/grade/chapter/{subject}/{grade}/create', [SubjectController::class, 'storeChapterByGradeWise'])->name('store-chapter');
    Route::delete('/subject/grade/chapter/{chapter}/delete', [SubjectController::class, 'deleteChapter'])->name('delete-chapte');
    Route::get('/chapter/approve/{chapter_id}', [SubjectController::class, 'chapterApproveByTeacher'])->name('chapter.approve');

    //unit create and show unit list
    Route::get('/subject/grade/chapter/unit/{subject}/{grade}/{chapter}', [UnitController::class, 'index'])->name('unit.index');
    Route::get('/subject/grade/chapter/unit/{subject}/{grade}/{chapter}/create', [UnitController::class, 'create'])->name('unit.create');
    Route::post('/unit/store', [UnitController::class, 'store'])->name('unit.store');
    Route::get('/unit/approve/{unit_id}', [UnitController::class, 'unitApproveByTeacher'])->name('unit.approve');

    //metarial 
    Route::get('/subject/chapter/unit/metarial/{subject}/{grade}/{chapter}/{unit}', [MetarialController::class, 'index'])->name('metarial.index');
    Route::get('/subject/chapter/unit/metarial/{subject}/{grade}/{chapter}/{unit}/create', [MetarialController::class, 'createMaterial'])->name('metarial.create');
    Route::post('/subject/chapter/unit/metarial/create', [MetarialController::class, 'storeChapterWiseMetarial'])->name('metarial.store');

    Route::get('/units', [TeacherController::class, 'unitList'])->name('units');
    Route::get('/block-student/{subject}/{chapter}/{unit}', [TeacherController::class, 'blockStudentOfQuiz'])->name('block-student-of-quize');
    Route::get('/unblock-student/{id}', [TeacherController::class, 'unblockStudent'])->name('unblockStudent');

    Route::get('/profile', [TeacherDashboard::class, 'myProfile'])->name('profile');
    Route::post('/update-profile', [TeacherDashboard::class, 'updateProfile'])->name('updateProfile');

    //password change
    Route::get('/change-password', [TeacherDashboard::class, 'changePassword'])->name('changePassword');
    Route::post('/change-password', [TeacherDashboard::class, 'UpdatePassword'])->name('updatePassword');

    //question create and show question list
    Route::get('/chapter/details', [ChapterController::class, 'details'])->name('chapter-details');
    Route::get('/question/create/{subject}/{grade}/{chapter}/{unit}', [QuestionController::class, 'create'])->name('question-create');
    Route::get('/question/list', [QuestionController::class, 'showAll'])->name('question-show');
    Route::post('/question/create/{subject}/{grade}/{chapter}/{unit}', [QuestionController::class, 'store'])->name('question-store');
});

/**
 * -----------------------------------------------------------------
 *  Student
 * -----------------------------------------------------------------
 * 
 * 
 */

Route::group(['prefix' => 'student', 'as' => 'student.', 'middleware' => ['auth', 'student']], function () {
    Route::get('/dashboard', [StudentDashboard::class, 'dashboard'])->name('dashboard');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    //subject create and show subject list
    Route::get('/subject', [SubjectController::class, 'getAllSubject'])->name('subjects');
    Route::get('/subject/create', [SubjectController::class, 'getCreatePage'])->name('subject-create-page');
    Route::post('/subject/create', [SubjectController::class, 'store'])->name('subject-create');
    Route::get('/subject/all', [SubjectController::class, 'list'])->name('subjectlist');

    Route::get('/material/create-video', [ChapterController::class, 'createMaterialVideo'])->name('chapter-material-post-video');
    Route::post('/material/create-video', [ChapterController::class, 'storeMaterialVideo'])->name('chapter-material-post-video');

    //question create and show question list
    Route::get('/chapter/details', [ChapterController::class, 'details'])->name('chapter-details');
    Route::get('/question/create/{subject}/{grade}/{chapter}/{unit}', [QuestionController::class, 'create'])->name('question-create');
    Route::get('/question/list', [QuestionController::class, 'showAll'])->name('question-show');
    Route::post('/question/create/{subject}/{grade}/{chapter}/{unit}', [QuestionController::class, 'store'])->name('question-store');

    //profile update and user create
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile-store');
    Route::get('/user/create', [AdminStaffsController::class, 'index'])->name('usercreate');

    //password change
    Route::get('/change-password', [SettingController2::class, 'changePassword'])->name('admin.changePassword');
    Route::post('/change-password', [SettingController2::class, 'UpdatePassword'])->name('admin.updatePassword');

    Route::get('/profile', [DashboardController::class, 'myProfile'])->name('admin.profile');
});

/**
 * ------------------------------------------------------------
 * Global route
 * -----------------------------------------------------------
 * 
 * 
 */
Route::prefix('student')->group(function () {
    Route::get('/mylist', [SubjectController::class, 'showMyList'])->middleware(['auth'])->name('mysubjectlist');

    Route::get('/subjects', [SubjectController::class, 'list'])->middleware(['auth'])->name('subjectlist');

    Route::get('/my-subjects/{subject}/grade', [SubjectController::class, 'subjectGrade'])->middleware(['auth'])->name('grade');

    Route::get('/my-subjects/{subject}/grade/{grade}/chapter', [SubjectController::class, 'subjectChapter'])->middleware(['auth'])->name('chapter');


    Route::get('/my-subjects/{subject}/grade/{grade}/chapter/{chapter}/units', [SubjectController::class, 'chapterLesson'])->middleware(['auth'])->name('lesson');
});

//Frontend route
Route::get('/landing', [FrontendController::class, 'index'])->middleware(['auth'])->name('landing');

Route::prefix('student')->middleware(['auth', 'student'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'myProfile'])->name('student.profile');
    Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');

    Route::get('/select-subjects', [FrontendController::class, 'chooseSubject'])->name('chooseSubject');
    Route::post('/select-subjects', [MysubjectController::class, 'insertSubjects'])->name('insertSubjects');
    Route::get('/select-grade', [MysubjectController::class, 'selectGrade'])->name('selectGrade');
    Route::post('/select-grade', [MysubjectController::class, 'updateGrade'])->name('updateGrade');

    Route::get('/my-subjects', [MysubjectController::class, 'mySubjects'])->name('mySubjects');
    Route::get('/my-marks', [FrontendController::class, 'myMarks'])->middleware(['auth'])->name('myMarks');

    //chapter 
    Route::get('/chapter/create', [ChapterController::class, 'create'])->name('chapter-create');
    Route::post('/chapter/create', [ChapterController::class, 'store'])->name('chapter-insert');

    Route::get('/my-courses/{subjectId}/chapters', [ChapterController::class, 'chapters'])->name('chapters');
    Route::get('/my-courses/{subject_id}/chapters/{chapter_id}/units', [ChapterlessionController::class, 'chapter_lessions'])->name('chapterLesson');

    //change password
    Route::get('/change-password', [SettingController1::class, 'changePassword'])->name('changePassword');
    Route::post('/change-password', [SettingController1::class, 'UpdatePassword'])->name('updatePassword');
});

// Route::middleware(['auth'])->group(function () {
Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [FrontendController::class, 'myProfile'])->name('profile');
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy']);
    Route::get('/my-courses/{subject_id}/chapters/{chapter_id}/units', [ChapterlessionController::class, 'chapter_lessions'])->name('chapterLesson');
    Route::post('/my-courses/quize-submit', [QuizeController::class, 'quizeSubmit'])->name('quizeSubmit');
    Route::post('/my-courses/quize-start', [QuizeController::class, 'startQuize'])->name('startQuize');

    Route::get('/my-courses/quize-complete', [QuizeController::class, 'completeQuize'])->name('completeQuize');
    Route::get('/my-courses/quize-delete', [QuizeController::class, 'deleteQuize'])->name('deleteQuize');
    Route::get('/my-courses/toal-question-of-quize', [QuizeController::class, 'totalQuestionOfQuiz'])->name('totalQuestionOfQuize');
    Route::get('/student/notification', [NotificationController::class, 'showNotification'])->name('showNotification');
});

require __DIR__ . '/auth.php';
