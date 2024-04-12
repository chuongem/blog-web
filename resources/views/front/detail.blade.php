@extends('front.layout.master')

@section('title', 'Detail')

@section('meta')
  @if (!empty($details['meta_description']))
    <meta name="description" content="{{ $details['meta_description'] }}">
  @endif

  @if (!empty($details['meta_keywords']))
    <meta name="keywords" content="{{ $details['meta_keywords'] }}">
  @endif
@endsection

@section('body')
    <!-- start: .content -->
    <article class="main-article primary-cat-3 post type-post status-publish format-standard has-post-thumbnail hentry">
          <header>
            <!-- start: .post-format-image -->
            <div class="post-format-image">
              <div class="featured-image epcl-decoration-border">
                <div class="epcl-loader">
                    <img src="{{ $details['image'] }}" class="fullwidth">
                </div>
              </div>
            </div>
            <!-- end: .post-format-image -->
            <div class="info">
              <h1 class="main-title title textcenter">
                {{ $details['title'] ?? '' }}
              </h1>
              <!-- start: .meta -->
              <div class="meta">
                <p class="meta-info" datetime="">{{ $now }}
                  <img src="/front/img/fire-solid.svg" alt="">
                  10
                </p>
              </div>
              <!-- end: .meta -->
            </div>
          </header>
          <section class="post-content">
            <div class="text">
              <p>
                {!! $details['body'] !!}
              </p>
            </div>
          </section>
    </article>
    <!--.content end -->
@endsection
