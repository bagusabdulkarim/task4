@extends("layouts.application")

@section("content")

  <div class="row">

    <h2 align="center">List Articles</h2>

  {!! link_to(route("articles.create"), "Create", ["class"=>"pull-right btn btn-raised btn-primary"]) !!}

  </div>

  @include('articles.list')
  {!! $articles->links('pagination') !!}
@stop
