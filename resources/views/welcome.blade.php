@extends("layouts.welcome")

@section('content')
<div class="container-fluid ">
    <div class=" row d-flex justify-content-center">
        <div class="col-8 col-md-8 col-lg-8 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-head p-2 bg-primary bg-gradient text-center text-white">
                    <h3>Welcome to Saving Challenge</h3>
                </div>
                <div class="card-body">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{asset('/dist/img/picture1.jpg')}}" class="d-block" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('/dist/img/picture5.jpeg')}}" class="d-block " alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('/dist/img/picture3.jpg')}}" class="d-block " alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('/dist/img/picture4.jpeg')}}" class="d-block " alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('/dist/img/picture5.jpeg')}}" class="d-block " alt="...">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style scoped>
    /* .img {
        height: 2px
    } */
</style>
@endsection