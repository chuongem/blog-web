@extends('front.layout.master')

@section('title', 'Category')

@section('body')
    <!-- -->
    <!--home begin -->
    {{-- @foreach ($categoryList as $item)
        <x-card-item :title="$item['title'] ?? ''" :sub-title="$item['excerpt'] ?? ''" :image="$item['image'] ?? ''"/>
    @endforeach --}}
    @foreach ($categoryList as $item)
        <div class="card-container">
            <div class="image">
                <a href="{{ route('detail_feature', ['slug' => $item['slug']]) }}" class="thumb translate-effect loaded">
                    <img src="{{ $item['image'] ?? '' }}">
                </a>
            </div>
            <div class="content">
                <h1 class="title">
                    <a href="{{ route('detail_feature', ['slug' => $item['slug']]) }}">{{ $item['title'] ?? '' }}</a>
                </h1>
                <div class="sub-title">{{ $item['excerpt'] }}</div>
            </div>
        </div>
    @endforeach
    <!--home end -->
    <!-- pagination -->
    <div class="text-center py-5">
        @if ($data['page'] > 1)
          <a class="paginate-link" href="{{ route('home', ['page' => $data['page'] - 1]) }}">Previous</a>
        @endif
        <span class="mx-3">Page {{ $data['page'] }} of {{ $data['total'] }}</span>
        @if ( $data['page'] != $data['total'])
          <a class="paginate-link" href="{{ route('home', ['page' => $data['page'] + 1]) }}">Next</a>
        @endif
    </div>
@endsection
@section('scripts')
<script></script>
@endsection

