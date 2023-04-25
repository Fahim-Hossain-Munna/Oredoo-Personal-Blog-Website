<?php

use App\Http\Controllers\{ContactInboxController, FrontviewController , HomeController , HomeUserBlogPostController, HomeUserCategoryController, HomeUserProfileController, HomeUserTagController, SinglePostController, SocialiteLoginController, subscriberController, UsersManageController, WebBloggerLogRegisController, WebSearchController, WebTagController};
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

// reserve function which is pre-build

// Route::get('/', function () {
//     return view('welcome');
// });



//  registration route off code ... user can't register a admin account
Auth::routes(['register' => false]);


// front view and mannagement part
route::get('/' , [FrontviewController::class , 'index'])->name('index');
route::get('/blog' , [FrontviewController::class , 'web_blog'])->name('web.blog');
route::get('/search' , [WebSearchController::class , 'web_search'])->name('web.search');
route::get('/about' , [FrontviewController::class , 'web_about'])->name('web.about');
route::get('/contact' , [FrontviewController::class , 'web_contact'])->name('web.contact');
route::get('/author' , [FrontviewController::class , 'web_author'])->name('web.author');
route::get('/blog/login' , [WebBloggerLogRegisController::class , 'web_login'])->name('web.login');
route::get('/blog/register' , [WebBloggerLogRegisController::class , 'web_register'])->name('web.register');

// category and blog related
route::get('/category/{slug}/{id}' , [FrontviewController::class , 'web_category'])->name('web.category');
route::get('/singlepost/{id}' , [SinglePostController::class , 'single_post'])->name('web.single.post');
route::post('/singlepost/comment/{id}' , [SinglePostController::class , 'single_post_comment'])->name('web.single.post.comment');
route::post('/singlepost/comment/delete/{id}' , [SinglePostController::class , 'single_post_comment_delete'])->name('web.single.post.comment.delete');
route::post('/subscriber' , [subscriberController::class , 'subscriber'])->name('subscriber');
route::post('/contact/insert' , [FrontviewController::class , 'web_contact_insert'])->name('web.contact.insert');
route::post('/blog/login/post' , [WebBloggerLogRegisController::class , 'web_login_post'])->name('web.login.post');
route::post('/blog/register/post' , [WebBloggerLogRegisController::class , 'web_register_post'])->name('web.register.post');
route::get('/tag/{id}' , [WebTagController::class , 'web_tag'])->name('web.tag');



Route::middleware(['auth','verified'])->group(function () {
    // Dashboard control and mannagement part
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Dashboard to webpage view part
    Route::get('/webpage/view', [HomeController::class, 'view'])->name('viewsite');
    // Dashboard user profile update controller
    Route::get('/home/profile', [HomeUserProfileController::class, 'profile_index'])->name('profile');
    Route::get('/home/settings', [HomeUserProfileController::class, 'profile_settings'])->name('profile.settings');
    Route::get('/home/skills', [HomeUserProfileController::class, 'skills'])->name('skills');
    Route::post('/home/profile/name/update/{id}', [HomeUserProfileController::class, 'profile_name'])->name('profile.name');
    Route::post('/home/profile/email/update/{id}', [HomeUserProfileController::class, 'profile_email'])->name('profile.email');
    Route::post('/home/profile/password/update/{id}', [HomeUserProfileController::class, 'profile_password'])->name('profile.password');
    Route::post('/home/profile/picture/update/{id}', [HomeUserProfileController::class, 'profile_picture'])->name('profile.picture');
    Route::post('/home/profile/biodata/update/{id}', [HomeUserProfileController::class, 'profile_biodata'])->name('profile.biodata');

    Route::middleware(['admincheck'])->group(function () {
        // Dashboard user category update controller
        Route::get('/home/category', [HomeUserCategoryController::class, 'category_index'])->name('category');
        Route::get('/home/users', [UsersManageController::class, 'user_index'])->name('users');
        Route::post('/home/users/search', [UsersManageController::class, 'user_search_index'])->name('users.search');
        Route::post('/home/users/delete/{id}', [UsersManageController::class, 'user_delete_index'])->name('users.delete');
        // Dashboard user tag update controller
        Route::get('/home/tag', [HomeUserTagController::class, 'tag_index'])->name('tag');
        Route::get('/website/contact/messages', [ContactInboxController::class, 'contact_message'])->name('contact.inbox');
        Route::post('/website/contact/messages/{id}', [ContactInboxController::class, 'contact_message_mail_send'])->name('contact.inbox.mail');
        Route::post('/website/contact/messages/delete/{id}', [ContactInboxController::class, 'contact_message_mail_delete'])->name('contact.inbox.mail.delete');

    });
    // Dashboard user Blog-post update controller
    Route::get('/home/blog/post', [HomeUserBlogPostController::class, 'blog_post_index'])->name('blogpost');
    Route::get('/home/blog/post/insert', [HomeUserBlogPostController::class, 'blog_post_insert'])->name('blogpost.insert');
    Route::get('/home/blog/post/edit/{id}', [HomeUserBlogPostController::class, 'blog_post_edit'])->name('blogpost.edit');
    Route::post('/home/blog/post/edit/{id}', [HomeUserBlogPostController::class, 'blog_post_update'])->name('blogpost.update');
    Route::get('/home/blog/post/details/view/{id}', [HomeUserBlogPostController::class, 'blog_post_details_view'])->name('blogpost.details');
    Route::post('/home/blog/post/insert', [HomeUserBlogPostController::class, 'blog_post_insert_post'])->name('blogpost.insert.post');
    Route::get('/home/blog/inventory/tag/add/{id}', [HomeUserBlogPostController::class, 'blog_post_add_tag'])->name('blogpost.inventory.tag');
    Route::post('/home/blog/delete/{id}', [HomeUserBlogPostController::class, 'blog_delete'])->name('blogpost.delete');
});

// email verification all routes
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// socialite login route

// github
Route::get('/github/redirect', [SocialiteLoginController::class, 'github_redirect'])->name('github.redirect');
Route::get('/github/callback', [SocialiteLoginController::class, 'github_callback'])->name('github.callback');
// google
Route::get('/google/redirect', [SocialiteLoginController::class, 'google_redirect'])->name('google.redirect');
Route::get('/google/callback', [SocialiteLoginController::class, 'google_callback'])->name('google.callback');
