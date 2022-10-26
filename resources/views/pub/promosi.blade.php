@extends('layout_pub.main')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>Promosi</h2>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                    <div class="row gy-5 posts-list" id="list_news">



                    </div><!-- End blog posts list -->

                    <div class="blog-pagination">
                        <ul class="justify-content-center" id="pagenations">

                        </ul>
                    </div><!-- End blog pagination -->

                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">

                    <div class="sidebar ps-lg-4">

                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Berita Lainnya</h3>

                            <div class="mt-3" id="sidenews">




                            </div>

                        </div><!-- End sidebar recent posts-->
                        <br>
                        <h3 class="sidebar-title">Pintasan</h3>

                        <div class="sidebar-item recent-posts">
                            <div class="mt-3">
                                <div class="post-item mt-12">
                                    <div class="row gy-12" data-aos="fade-up">
                                        <img src="{{ env('APP_URL') }}assets/img/pintasan1.jpeg"
                                            style="height: 80px; width: 300px;" class="img-fluid" alt="">
                                    </div>
                                    <br>
                                    <div class="row gy-12" data-aos="fade-up">
                                        <img src="{{ env('APP_URL') }}assets/img/pintasan2.jpg"
                                            style="height: 80px; width: 300px;" class="img-fluid" alt="">
                                    </div>
                                </div><!-- End recent post item-->
                            </div>
                        </div><!-- End sidebar recent posts-->

                    </div><!-- End Blog Sidebar -->

                </div>

            </div>

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->

@endsection

@section('js')
<script>
    let d = @json($data);
    console.log('datatatata : ');
    console.log(d);
    function sideNews(){
        var data =  @json($data);
        var lengthData =data.length
        var e = document.querySelector("#sidenews");
        
        //e.firstElementChild can be used.
        var child = e.lastElementChild; 
        while (child) {
            e.removeChild(child);
            child = e.lastElementChild;
        }
        for(var i = 1; i<=4;i++ ){
            var rand = Math.floor(Math.random() * lengthData)
            var elemetSide = data[rand]
            
            const event = new Date(data[1].date);
            // console.log(elemetSide)

            var thenews = ` <div class="post-item mt-3">
                                    <img src="{{ env('APP_URL') }}${elemetSide.photo_path}"
                                        style="height:  70px; width: 100px;" alt="" class="flex-shrink-0">
                                    <div>
                                        <h4><a href="/berita/${elemetSide.slug}">${elemetSide.title}</a></h4>
                                        <time datetime="2020-01-01">${event.toDateString()}</time>
                                    </div>
                                </div>`;
            let app = document.querySelector('#sidenews');
            app.insertAdjacentHTML('beforeend',thenews);


        }

    }

    function Page(page){

        


        var data =  @json($data);
        var length_page =Math.ceil(data.length / 4)
        document.querySelectorAll(".this-lists").forEach(el => el.remove());
            for(var i=1; i<=length_page;i++){     
                if(i==page){
                        var elements = `<li id="list-${i}" class="active this-lists" onclick="Page(${i})"><a href="#${i}">${i}</a></li>`;
                }else{
                    var elements = `<li id="list-${i}" class="this-lists" onclick="Page(${i})"><a href="#${i}">${i}</a></li>`;
                }  
                let app = document.querySelector('#pagenations');
                app.insertAdjacentHTML('beforeend',elements);
            }
            
        var lengthData =data.length

        console.log('All news')
        console.log(lengthData)
        console.log('this page : ',page)

        var lastNews = page * 4;
        var startNews = lastNews - 4;
        if(lastNews > lengthData){
            lastNews = lengthData;
        }
        console.log('news for this page from :',startNews,'until: ',lastNews)


        var e = document.querySelector("#list_news");
        
        var child = e.lastElementChild; 
        while (child) {
            e.removeChild(child);
            child = e.lastElementChild;
        }
        let j = startNews;
        while( j < lastNews){
            const event = new Date(data[1].date);
            var element = data[j]
            console.log(element)
            // console.log(element)
            
            var articles = `<div class="col-lg-12">
                            <article class="d-flex flex-column">
                                <div class="post-img">
                                    <img src="{{ env('APP_URL') }}${data[j].photo_path}" alt="" class="img-fluid">
                                </div>

                                <h2 class="title">
                                    <a href="/berita/${element.slug}">${data[j].title}</a>
                                </h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="/berita/${element.slug}"><time datetime="2022-01-01">${event.toDateString()}</time></a></li>
                                       
                                    </ul>
                                </div>

                            </article>
                        </div><!-- End post list item -->
                    `;
                    let app = document.querySelector('#list_news');
                app.insertAdjacentHTML('beforeend',articles);
    
            j++;
        }
        sideNews()
    }

    
    function getNews(){
       var data =  @json($data);
       var lengthData =Math.ceil(data.length / 4)
       console.log(lengthData)
       var elements = `<li class="active this-lists" onclick="Page(1)"><a href="#1">1</a></li>`;
        let app = document.querySelector('#pagenations');
        app.insertAdjacentHTML('beforeend',elements);

       for(var i=2; i<=lengthData;i++){        
            var elements = `<li id="list-${i}" class="this-lists" onclick="Page(${i})"><a href="#${i}">${i}</a></li>`;
            let app = document.querySelector('#pagenations');
            app.insertAdjacentHTML('beforeend',elements);
            
        }
        if (document.readyState) {
            Page(1)
        }
       
        
    }
    getNews();
    


</script>
@endsection