<div class="slider-container">
    <div class="slider">
        @foreach ($list_banner as $row)
            @if ($loop->first)
                <div class="slide active">
                    <img src="{{ asset('images/banners/' . $row->image) }}" alt="{{ $row->image }}" class="active">
                </div>
            @else
                <div class="slide">
                    <img src="{{ asset('images/banners/' . $row->image) }}" alt="{{ $row->image }}">
                </div>
            @endif
        @endforeach

        <div class="prev">&#10094;</div>
        <div class="next">&#10095;</div>
    </div>
</div>




@section('footer')
    <script>
        const slides = document.querySelectorAll('.slide');
        const prevBtn = document.querySelector('.prev');
        const nextBtn = document.querySelector('.next');

        let currentSlide = 0;

        function showSlide(n) {
            slides[currentSlide].classList.remove('active');
            currentSlide = (n + slides.length) % slides.length;
            slides[currentSlide].classList.add('active');
        }

        function prevSlide() {
            showSlide(currentSlide - 1);
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        prevBtn.addEventListener('click', prevSlide);
        nextBtn.addEventListener('click', nextSlide);

        setInterval(nextSlide, 10000); // Tự động chuyển ảnh sau 5 giây
    </script>
@endsection
