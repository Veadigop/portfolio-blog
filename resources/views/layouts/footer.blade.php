
</div>

<footer>

    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-3 mt-1">
                <h3><span>Article Categories</span></h3>

                    <ul class="post-category">
                    @foreach($categories as $category)
                            <li><a href="/category/{{$category->id}}/articles"> {{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-3 mb-3 mt-1">
                    <h3><span>Contacts</span></h3>
                    <ul class="contacts">
                        <li><i class="fa fa-envelope-o"></i>example@gmail.com</li>
                        <li><i class="fa fa-phone"></i>+380(5)16-136-777</li>
                        <li><i class="fa fa-skype"></i>example</li>
                        <li><i class="fa fa-phone"></i>+380(7)17-136-777</li>
                    </ul>
                </div>
                <div class="col-md-3 mb-3 mt-1">
                    <h3><span>Follow Us</span></h3>
                    <ul class="social-network">
                        <li><a href="https://facebook.com"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" title="veadigop"><i class="fa fa-skype"></i></a></li>

                    </ul>
                </div>

                <div class="col-md-3 mb-3 mt-1">
                    <h3><span>Location</span></h3>
                    <p>1234 Heaven Stress, Beverly</p>
                    <p>Hill OldYork- United State of Lorem</p>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="footer-logo">
                        Veadigop
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="copyright text-right">
                        {{ date('Y') }} &copy; Veadigop
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>