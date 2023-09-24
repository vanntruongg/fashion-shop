<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title ?? 'Trang Home'}}</title>
    @vite('resources/css/app.css')
</head>
<body>
    @component('components.header')
    @endcomponent
    @component('components.nav')
    @endcomponent