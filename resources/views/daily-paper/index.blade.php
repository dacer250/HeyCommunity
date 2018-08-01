@extends('layouts.default')

@section('title')
今日赣州 - {{ $system->site_title }}
@endsection

@section('description')
今日赣州实时的新闻与资讯
@endsection

@section('mainBody')
    <div id="section-mainbody" class="page-daily-paper-index">
        <div class="container pt-2">
            <div class="row">
                <div class="col-md-8">
                    <div class="row items-masonry">
                        @if ($dailies->count())
                            <div id="component-topic-list" class="list-group">
                                @foreach ($dailies as $daily)
                                    @if ($daily->entity_type == 'App\News')
                                        <!-- News -->
                                        <div class="item-masonry col-md-4 mt-4 m-np">
                                            <div class="card">
                                                @if ($daily->entity->avatar)
                                                    <a href="{{ route('news.show', $daily->entity->id) }}"><img class="card-img-top" src="{{ $daily->entity->avatar }}"></a>
                                                    <div class="card-body">
                                                        <h5 class="card-title"><a href="{{ route('news.show', $daily->entity->id) }}">{{ $daily->entity->title }}</a></h5>
                                                        <p class="card-text">{{ str_limit(strip_tags($daily->entity->content), 200) }}</p>
                                                    </div>
                                                @else
                                                    <div class="card-body">
                                                        <h5 class="card-title"><a href="{{ route('news.show', $daily->entity->id) }}">{{ $daily->entity->title }}</a></h5>
                                                        <p class="card-text">{{ str_limit(strip_tags($daily->entity->content), 300) }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @elseif ($daily->entity_type == 'App\Topic')
                                        <!-- Topic -->
                                        <div class="item-masonry col-md-4 mt-4 m-np">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title"><a href="{{ route('topic.show', $daily->entity->id) }}">{{ $daily->entity->title }}</a></h5>
                                                    <p class="card-text">{{ str_limit(strip_tags($daily->entity->content), 300) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif ($daily->entity_type == 'App\Activity')
                                        <!-- Activity -->
                                        <div class="item-masonry col-md-4 mt-4 m-np">
                                            <div id="component-activity-card" class="card card-activity">
                                                <a class="box-pic" href="{{ route('activity.show', $daily->entity->id) }}">
                                                    <div class="start-time">
                                                        <i class="fa fa-calendar"></i>&nbsp; {{ $daily->entity->start_time }}
                                                    </div>
                                                    <img class="card-img-top m-nb-r" src="{{ asset($daily->entity->avatar) }}" alt="{{ $daily->entity->title }}">
                                                </a>
                                                <div class="card-body">
                                                    <h4 class="card-title"><a href="{{ route('activity.show', $daily->entity->id) }}">{{ $daily->entity->title }}</a></h4>
                                                    <p class="card-text">{{ $daily->entity->intro }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <div class="card">
                                <div class="card-body">
                                    暂无数据
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">

                    <div class="mt-4 m-np">
                        @include('layouts._tail')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('bower-assets/masonry-layout/dist/masonry.pkgd.min.js') }}"></script>
    <script>
      $(document).ready(function() {
        setTimeout(function() {
          $('.items-masonry').masonry({itemSelector: '.item-masonry'})
        }, 10);
      });
    </script>
@stop
