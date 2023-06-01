<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
  Route::prefix('component')->name('component.')->group(function () {
    Route::get('accordion', function () {
      return view('pages.admin.components.component.accordion');
    })->name('accordion');

    Route::get('alert', function () {
      return view('pages.admin.components.component.alert');
    })->name('alert');

    Route::get('badge', function () {
      return view('pages.admin.components.component.badge');
    })->name('badge');

    Route::get('breadcrumb', function () {
      return view('pages.admin.components.component.breadcrumb');
    })->name('breadcrumb');

    Route::get('button', function () {
      return view('pages.admin.components.component.button');
    })->name('button');

    Route::get('card', function () {
      return view('pages.admin.components.component.card');
    })->name('card');

    Route::get('carousel', function () {
      return view('pages.admin.components.component.carousel');
    })->name('carousel');

    Route::get('collapse', function () {
      return view('pages.admin.components.component.collapse');
    })->name('collapse');

    Route::get('dropdown', function () {
      return view('pages.admin.components.component.dropdown');
    })->name('dropdown');

    Route::get('list-group', function () {
      return view('pages.admin.components.component.list-group');
    })->name('listGroup');

    Route::get('modal', function () {
      return view('pages.admin.components.component.modal');
    })->name('modal');

    Route::get('navs', function () {
      return view('pages.admin.components.component.navs');
    })->name('navs');

    Route::get('pagination', function () {
      return view('pages.admin.components.component.pagination');
    })->name('pagination');

    Route::get('progress', function () {
      return view('pages.admin.components.component.progress');
    })->name('progress');

    Route::get('spinner', function () {
      return view('pages.admin.components.component.spinner');
    })->name('spinner');

    Route::get('toasts', function () {
      return view('pages.admin.components.component.toasts');
    })->name('toasts');

    Route::get('tooltip', function () {
      return view('pages.admin.components.component.tooltip');
    })->name('tooltip');
  });

  Route::prefix('extra-component')->name('extra.')->group(function () {

    Route::get('avatar', function () {
      return view('pages.admin.components.extra-component.avatar');
    })->name('avatar');

    Route::get('date-picker', function () {
      return view('pages.admin.components.extra-component.date-picker');
    })->name('date-picker');

    Route::get('divider', function () {
      return view('pages.admin.components.extra-component.divider');
    })->name('divider');

    Route::get('rating', function () {
      return view('pages.admin.components.extra-component.rating');
    })->name('rating');

    Route::get('sweet-alert', function () {
      return view('pages.admin.components.extra-component.sweet-alert');
    })->name('sweet-alert');

    Route::get('toastify', function () {
      return view('pages.admin.components.extra-component.toastify');
    })->name('toastify');
  });

  Route::prefix('layouts')->name('layouts.')->group(function () {

    Route::get('default', function () {
      return view('pages.admin.components.layouts.default');
    })->name('default');

    Route::get('vertical', function () {
      return view('pages.admin.components.layouts.vertical');
    })->name('vertical');
  });

  Route::prefix('form-elements')->name('form-elements.')->group(function () {

    Route::get('input', function () {
      return view('pages.admin.components.form-elements.input');
    })->name('input');

    Route::get('select', function () {
      return view('pages.admin.components.form-elements.select');
    })->name('select');

    Route::get('radio', function () {
      return view('pages.admin.components.form-elements.radio');
    })->name('radio');

    Route::get('checkbox', function () {
      return view('pages.admin.components.form-elements.checkbox');
    })->name('checkbox');

    Route::get('textarea', function () {
      return view('pages.admin.components.form-elements.textarea');
    })->name('textarea');
  });

  Route::get('form-layout', function () {
    return view('pages.admin.components.form-layout.index');
  })->name('form-layout');

  Route::prefix('form-editor')->name('form-editor.')->group(function () {

    Route::get('quill', function () {
      return view('pages.admin.components.form-editor.quill');
    })->name('quill');
  });

  Route::prefix('datatables')->name('datatables.')->group(function () {

    Route::get('datatable', function () {
      return view('pages.admin.components.datatables.datatable');
    })->name('datatable');

    Route::get('datatable-jquery', function () {
      return view('pages.admin.components.datatables.datatable-jquery');
    })->name('datatable-jquery');
  });
});
