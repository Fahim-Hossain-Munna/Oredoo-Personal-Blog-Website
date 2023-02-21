<?php

use App\Http\Controllers\{FrontviewController , HomeController , HomeUserBlogPostController, HomeUserCategoryController, HomeUserProfileController, HomeUserTagController, SinglePostController, subscriberController, WebBloggerLogRegisController, WebSearchController, WebTagController};
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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



Route::middleware(['auth'])->group(function () {

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
        // Dashboard user tag update controller
        Route::get('/home/tag', [HomeUserTagController::class, 'tag_index'])->name('tag');

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
