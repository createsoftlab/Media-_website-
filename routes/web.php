<?php

use App\Http\Controllers\UserComment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BloggerController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventPostController;
use App\Http\Controllers\LiveEventController;
use App\Http\Controllers\adminProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
route::get('/', [HomeController::class, 'view_home']);

route::get('/about', [HomeController::class, 'view_about']);
route::get('/archive', [HomeController::class, 'view_archive']);
route::get('/author', [HomeController::class, 'view_author']);
route::get('/book', [HomeController::class, 'view_book']);
route::get('/contact', [HomeController::class, 'view_contact']);
route::get('/flip', [HomeController::class, 'view_flip']);

route::get('/home_lifestyle_blog', [HomeController::class, 'view_home_lifestyle_blog']);
route::get('/privacy_policy', [HomeController::class, 'view_privacy_policy']);
route::get('/post_format_video', [HomeController::class, 'view_post_format_video']);
route::get('/post_format_standard', [HomeController::class, 'view_post_format_standard']);
route::get('/post_format_text', [HomeController::class, 'view_post_format_text']);
route::get('/post_format_gallery', [HomeController::class, 'view_post_format_gallery']);
route::get('/post_blog', [HomeController::class, 'view_post_blog']);
route::get('/post_layout', [HomeController::class, 'view_post_layout1']);
route::get('/maintenance', [HomeController::class, 'view_maintenance']);
route::get('/404', [HomeController::class, 'view_404']);
route::get('/apply_events/{id}', [HomeController::class, 'apply_events']);

route::get('/blog_post_details', [HomeController::class, 'blog_post_details']);
route::get('/view_competitions', [HomeController::class, 'view_competitions']);

//category index
route::get('/category/post_list/{id}', [HomeController::class, 'category_post_list'])->name('category.post_list');

//blog posts
route::get('/post_list', [HomeController::class, 'view_post_list']);
Route::get('/blog_post_details/{id}/{slug}', [HomeController::class, 'blog_post_details'])->name('blogPost.details');
route::get('/book_blog_post_details/{id}', [HomeController::class, 'book_post_details'])->name('book.blogPost.details');
Route::post('/posts/{post}/like', [LikeController::class, 'toggleLike'])->name('posts.like');

Route::post('/comments', [CommentController::class, 'store']);
Route::post('/comment/{commentId}/reply', [CommentController::class, 'storeReply'])->name('storeReply')->middleware('auth');

// events home
route::get('/home/events', [HomeController::class, 'view_events'])->name('home.events');
route::get('home/event_details/{id}', [HomeController::class, 'event_details'])->name('home.event.details');
route::get('/apply_events/{id}', [HomeController::class, 'apply_events'])->name('home.apply.events');
Route::get('/event_post_details/{id}/{slug}', [HomeController::class, 'event_post_details'])->name('home.event.postDetails');
route::get('/book_eventPost_details/{id}', [HomeController::class, 'book_event_post_details'])->name('book.eventPost.details');
Route::post('/eventPosts/{post}/like', [LikeController::class, 'toggleLikeEvents'])->name('eventPosts.like');

Route::post('/eventcomments', [CommentController::class, 'eventCommentStore'])->name('eventcomments.store')->middleware('auth');
Route::post('/eventreply/{commentId}', [CommentController::class, 'storeEventReply'])->name('event.storeReply')->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['admin'])->group(function () {

    route::get('admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');

    // Admin Profile
    Route::get('admin/profile_view',[adminProfileController::class, 'view'])->name('admin.profile');
    Route::put('admin/profile_passwordReset',[adminProfileController::class, 'passwordReset'])->name('admin.passwordReset');
    Route::put('admin/profile_update',[adminProfileController::class, 'profileUpdate'])->name('admin.profile.update');

    route::get('admin/view_comment',[AdminController::class,'view_comment']);
    route::get('admin/view_Event_comment',[AdminController::class,'view_Event_comment']);

    Route::post('/comments/{id}/approve', [AdminController::class, 'approveComment'])->name('comments.approve');
    Route::delete('/comments/{id}/delete', [AdminController::class, 'deleteComment'])->name('comments.delete');


    Route::post('/eventcomments/{id}/approve', [AdminController::class, 'approveEventComment'])->name('eventcomments.approve');
    Route::post('/eventcomments/{id}/delete', [AdminController::class, 'deleteEventComment'])->name('eventcomments.delete');


    route::get('admin/view_contact',[AdminController::class,'view_contact']);

    // Crud For Gallery
    route::get('admin/view_galary',[GalleryController::class,'view_galary'])->name('view.gallery');
    route::get('admin/gallery/create',[GalleryController::class,'createGallery'])->name('create.gallery');
    Route::post('admin/gallery/store', [GalleryController::class, 'store'])->name('store.gallery');
    Route::delete('admin/gallery/delete/{id}', [GalleryController::class, 'delete'])->name('delete.gallery');

    // Crud For Tags
    route::get('admin/view_tags',[TagController::class,'view_tags'])->name('view.tags');
    route::post('admin/store_tags',[TagController::class,'storeTags'])->name('store.tags');
    route::put('admin/update_tags/{id}',[TagController::class,'updateTags'])->name('update.tags');
    Route::delete('admin/delete_tags/{id}', [TagController::class, 'delete'])->name('delete.tags');

    // Crud For Users
    route::get('admin/view_users',[UserController::class,'viewUsers'])->name('view.users');
    Route::delete('admin/delete_users/{id}', [UserController::class, 'delete'])->name('delete.uers');

    // Crud For Categories
    route::get('admin/view_categories',[CategoryController::class,'viewCategories'])->name('view.categories');
    route::post('admin/store_categories',[CategoryController::class,'storeCategories'])->name('store.categories');
    route::put('admin/update_categories/{id}',[CategoryController::class,'updateCategories'])->name('update.categories');
    Route::delete('admin/delete_categories/{id}', [CategoryController::class, 'delete'])->name('delete.categories');

    // Crud For Events
    route::get('admin/view_events',[EventController::class,'viewEvents'])->name('view.events');
    route::get('admin/view_inactiveEvents',[EventController::class,'viewInactiveEvents'])->name('view.inactive.events');
    Route::get('admin/event/{id?}', [EventController::class, 'createOrEdit'])->name('createOrEdit.event');
    Route::post('admin/event/{id?}', [EventController::class, 'storeOrUpdate'])->name('storeOrUpdate.event');
    Route::delete('admin/delete_event/{id}', [EventController::class, 'delete'])->name('delete.event');
    Route::put('admin/activate_event/{id}', [EventController::class, 'activate'])->name('activate.events');

    // Crud For Live Events
    route::get('admin/view_live_events',[LiveEventController::class,'view_live_Events'])->name('view.liveevents');
    route::get('admin/add_live_events',[LiveEventController::class,'add_live_Events'])->name('add.liveevents');
    Route::post('/live_events', [LiveEventController::class, 'store'])->name('live_events.store');
    route::get('admin/edit_live_events/{id}',[LiveEventController::class,'edit_live_Events'])->name('edit.liveevents');
    Route::post('/live-events/{id}', [LiveEventController::class, 'update_live_event'])->name('live_events.update');
    Route::delete('live_events/{id}', [LiveEventController::class, 'destroy'])->name('live_events.destroy');

    // event posts
    route::get('admin/view_all_eventPost',[EventPostController::class,'all_eventPosts'])->name('admin.eventPosts');
    route::put('admin/delete_eventPost/{id}',[EventPostController::class,'delete_eventPost'])->name('admin.delete.eventPost');
    route::get('admin/recyclebin_eventPost',[EventPostController::class,'admin_bin_EventPosts'])->name('admin.bin.eventPost');
    route::put('admin/restore_eventPost/{id}',[EventPostController::class,'admin_restore_eventgPost'])->name('admin.restore.eventPost');
    route::get('admin/view_eventPost/{id}',[EventPostController::class,'view_eventPost'])->name('admin.view.eventPost');
    route::put('admin/approve_eventPost/{id}',[EventPostController::class,'approve_eventPost'])->name('admin.approve.eventPost');

    // Crud For Admin Blog Posts(own posts)
    route::get('admin/post/create',[PostController::class,'createPost'])->name('create.post');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    route::get('admin/all_myblogPosts',[PostController::class,'all_myblogPosts'])->name('admin.myblogPosts');
    route::get('admin/edit_myblogPost/{id}',[PostController::class,'edit_myblogPost'])->name('admin.edit.myblogPost');
    route::put('admin/update_myblogPost/{id}',[PostController::class,'update'])->name('admin.update.myblogPost');
    route::get('admin/draft_myblogPosts',[PostController::class,'draft_myblogPosts'])->name('admin.draft.myblogPosts');
    //Admin Blog Posts Management
    route::get('admin/all_blogPosts',[PostController::class,'all_blogPosts'])->name('admin.allblogPosts');
    route::get('admin/view_blogPost/{id}',[PostController::class,'view_blogPost'])->name('admin.view.blogPost');
    route::put('admin/approve_blogPost/{id}',[PostController::class,'approve_blogPost'])->name('admin.approve.blogPost');
    route::put('admin/delete_blogPost/{id}',[PostController::class,'delete_blogPost'])->name('admin.delete.blogPost');
    route::get('admin/recyclebin_blogPost',[PostController::class,'recycle_binblogPosts'])->name('admin.bin.blogPost');
    route::put('admin/restore_blogPost/{id}',[PostController::class,'restore_blogPost'])->name('admin.restore.blogPost');
    route::delete('admin/delete_draft/{id}',[PostController::class,'delete_draft'])->name('admin.delete.draft');
});

Route::middleware(['user'])->group(function () {

    // user profile
    Route::get('user/profile_view',[adminProfileController::class, 'viewUserProfile'])->name('user.profile');
    Route::put('user/profile_passwordReset',[adminProfileController::class, 'passwordReset'])->name('user.passwordReset');
    Route::put('user/profile_update',[adminProfileController::class, 'profileUpdate'])->name('user.profile.update');

    route::get('user/dashboard',[UserController::class,'index'])->name('user.dashboard');

    route::get('user/events',[UserController::class,'view_events']);
    route::get('user/Add_events',[UserController::class,'view_add_events']);


    // New Blog Post
    route::get('user/create_blogPost',[PostController::class,'userCreateBlogPost'])->name('user.create.blogpost');
    Route::post('user/store_blogPost', [PostController::class, 'store'])->name('user.store.blogpost');
    route::get('user/all_myblogPosts',[PostController::class,'my_blogPosts'])->name('user.myblogPosts');
    route::get('user/edit_myblogPost/{id}',[PostController::class,'edit_blogPost'])->name('user.edit.myblogPost');
    route::put('user/update_myblogPost/{id}',[PostController::class,'update'])->name('user.update.myblogPost');
    route::get('user/draft_myblogPosts',[PostController::class,'draft_blogPosts'])->name('user.draft.myblogPosts');
    route::put('user/delete_blogPost/{id}',[PostController::class,'delete_blogPost'])->name('user.delete.blogPost');
    route::get('user/recyclebin_blogPost',[PostController::class,'user_binblogPosts'])->name('user.bin.blogPost');
    route::put('user/restore_blogPost/{id}',[PostController::class,'restore_blogPost'])->name('user.restore.blogPost');
    route::delete('user/delete_draft/{id}',[PostController::class,'delete_draft'])->name('user.delete.draft');

    // New Event Post
    route::get('user/all_myEventPosts',[EventPostController::class,'all_myEventPosts'])->name('user.myEventPosts');
    route::get('user/create_eventPost/{id}',[EventPostController::class,'createEventPost'])->name('user.create.eventPost');
    Route::post('user/posts/store', [EventPostController::class, 'store'])->name('eventPosts.store');
    route::get('user/draft_eventPosts',[EventPostController::class,'draft_eventPosts'])->name('user.draft.myEventPosts');
    route::put('user/delete_eventPost/{id}',[EventPostController::class,'delete_eventPost'])->name('user.delete.eventPost');
    route::get('user/recyclebin_eventPost',[EventPostController::class,'bin_EventPosts'])->name('user.bin.eventPost');
    route::put('user/restore_eventPost/{id}',[EventPostController::class,'restore_eventPost'])->name('user.restore.eventPost');
    route::delete('user/delete_draftEvent/{id}',[EventPostController::class,'delete_draftEvent'])->name('user.delete.draftEvent');
    route::get('user/edit_eventPost/{id}',[EventPostController::class,'edit_eventPost'])->name('user.edit.eventPost');
    route::put('user/update_eventPost/{id}',[EventPostController::class,'update'])->name('user.update.eventPost');

    route::get('user/view_blogComments',[UserComment::class ,'blog_view_comment']);
    route::get('user/view_eventComments',[UserComment::class ,'event_view_comment']);

    Route::post('/usercomments/{id}/approve', [UserComment::class, 'approveComment'])->name('usercomments.approve');
    Route::post('/usercomments/{id}/delete', [UserComment::class, 'deleteComment'])->name('usercomments.delete');


    Route::post('/usereventcomments/{id}/approve', [UserComment::class, 'approveEventComment'])->name('usereventcomments.approve');
    Route::delete('/usereventcomments/{id}/delete', [UserComment::class, 'deleteEventComment'])->name('usereventcomments.delete');
});




