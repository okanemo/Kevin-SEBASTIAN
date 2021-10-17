@extends('twill::layouts.form')

@section('contentFields')

    @formField('input', [
    'name' => 'title',
    'label' => 'Post Title',
    'maxlength' => 200
    ])

    @formField('input', [
    'name' => 'headline',
    'label' => 'Post headline',
    'maxlength' => 200
    ])

    @formField('select', [
    'name' => "category_id",
    'label' => "Post category",
    'options' => $categoryList,
    'placeholder' => 'Select a category',
    ])

    @formField('wysiwyg', [
    'name' => 'description',
    'label' => 'Post description',
    'placeholder' => 'Post description',
    'note' => 'Describe the post',
    ])

    @formField('tags')

    @formField('medias', [
    'name' => 'cover',
    'label' => 'Post Cover',
    'note' => 'Shown at a desktop breakpoint'
    ])

@stop
