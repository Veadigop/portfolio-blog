<!-- Card Columns Example Social Feed-->
<div class="mb-0 mt-4">
    <i class="fa fa-newspaper-o"></i> Latest articles</div>
<hr class="mt-2">
<div class="card-columns">
@foreach($latest_articles as $article)
    <!-- Example Social Card-->
        <div class="card mb-3">
            <a href="#">
                @if($article->article_images->where('article_id', $article->id)->where('tag','header')->first() != null)
                    <img class="card-img-top" src="{{$article->article_images->where('article_id', $article->id)->where('tag','header')->first()->image->link}}" width="511px" height="328px">
                @endif
            </a>
            <div class="card-body">
                <h6 class="card-title mb-1"><a href="admin/article/{{$article->id}}">{{$article->title}}</a></h6>
                <p class="card-text small">{{$article->short_description}}
                    <a href="admin/article/{{$article->id}}">read more</a>
                </p>
            </div>
            <div class="card-footer small text-muted">Posted on {{$article->created_at}}</div>
        </div>
    @endforeach
</div>
<!-- /Card Columns-->

<!-- Card Columns Example Social Feed-->
<div class="mb-0 mt-4">
    <i class="fa fa-newspaper-o"></i> Latest portfolios</div>
<hr class="mt-2">
<div class="card-columns">
@foreach($latest_portfolios as $portfolio)
    <!-- Example Social Card-->
        <div class="card mb-3">
            <a href="#">
                @if($portfolio->portfolio_images->where('portfolio_id', $portfolio->id)->where('tag','header')->first() != null)
                    <img class="card-img-top" src="{{$portfolio->portfolio_images->where('portfolio_id', $portfolio->id)->where('tag','header')->first()->image->link}}"  height="328px" width="511px">
                @endif
            </a>
            <div class="card-body">
                <h6 class="card-title mb-1"><a href="admin/portfolio/{{$portfolio->id}}">{{$portfolio->title}}</a></h6>
                <p class="card-text small">{{$portfolio->short_description}}
                    <a href="admin/portfolio/{{$portfolio->id}}">read more</a>
                </p>
            </div>
            <div class="card-footer small text-muted">Posted on {{$portfolio->created_at}}</div>
        </div>
    @endforeach
</div>
<!-- /Card Columns-->