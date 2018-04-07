<article class="one-third">
    <!--latest offers-->
    <div class="static-content index">
        <div class="row">
            <!--deal-->
            <div class="details">
                <h3 class="phometitle">{{$booking->activity_name}}
                    <span class="stars">
                        <?php
                        $Excellent = $booking->reviews->where('score_review', 'Excellent')->count();
                        $Verygood = $booking->reviews->where('score_review', 'Very good')->count();
                        $Average = $booking->reviews->where('score_review', 'Average')->count();
                        $Poor = $booking->reviews->where('score_review', 'Poor')->count();
                        $Terrible = $booking->reviews->where('score_review', 'Terrible')->count();
                        $sum = $booking->reviews->count();
                        $sum!=0?$sum:$sum=1;
                        $score = round(($Excellent*1+$Verygood*0.8+$Average*0.6+$Poor*0.4+$Terrible*0.2)/$sum*4,0);
                    ?>

                    @for($i=0; $i<=$score; $i++)
                    <i class="material-icons"></i>
                    @endfor
                    </span>                                    
                </h3>
            </div>
            <hr>

            @if($booking->images != NULL)
            @foreach( $booking->images as  $index => $img)
            @if($index === 1)
                <figure><a href="#" title=""><img src="/img/{{$img->image_name}}" alt="{{$booking->activity_name}}" /></a></figure>
                <input type="hidden" value="{{$index=0}}">
            @endif
            @endforeach 
            @else
                <figure><a href="package/#" title="">
                <img style="width: 900px; height: 250px;" src="/images/tour.jpg" alt="tour" /></a></figure>
                <input type="hidden" value="{{$index=0}}">

            @endif
            <!--//deal-->
        </div>
    </div>
    <!--//latest offers-->
</article>