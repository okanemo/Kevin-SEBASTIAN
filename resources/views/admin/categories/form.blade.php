@extends('twill::layouts.form')

@section('contentFields')

    @formField('input', [
    'name' => 'name',
    'label' => 'Category name',
    'maxlength' => 10
    ])

    @formField('medias', [
    'name' => 'cover',
    'label' => 'Post Cover',
    'note' => 'Shown at a desktop breakpoint'
    ])

@stop
