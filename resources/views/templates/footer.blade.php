<div class="footer-v1">
    <div class="footer">
        <div class="container">
            <div class="row">

                <div class="col-md-6">

                </div><!--/col-md-6-->

                <!-- Link List -->
                <div class="col-md-3 md-margin-bottom-40">
                    <div class="headline"><h2>Useful Links</h2></div>
                    <ul class="list-unstyled link-list">
                        <li><a href="{{ url('downloads') }}">Downloads</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="{{ url('contact') }}">Contact us</a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div><!--/col-md-3-->
                <!-- End Link List -->

                <!-- Address -->
                <div class="col-md-3 map-img md-margin-bottom-40">
                    <div class="headline"><h2>Contact Us</h2></div>
                    <address class="md-margin-bottom-40">
                        {{ Multisite::getContactDetails()->contact_address_1 }}<br>
                        {{ Multisite::getContactDetails()->contact_address_2 }}<br>
                        @if (Multisite::getContactDetails()->contact_address_3)
                            {{ Multisite::getContactDetails()->contact_address_3 }}<br>
                        @endif
                        {{ Multisite::getContactDetails()->contact_address_postcode }}<br>
                        Phone: {{ Multisite::getContactDetails()->contact_telephone }}<br>
                        Email: <a href="mailto:{{ Multisite::getContactDetails()->contact_email }}" class="">{{ Multisite::getContactDetails()->contact_email }}</a>
                    </address>
                </div><!--/col-md-3-->
                <!-- End Address -->
            </div>
        </div>
    </div><!--/footer-->

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <small><center><p>{!! Multisite::getFooterText() !!}</p></center></small>
                </div><!--/col-md-12-->
            </div>
        </div>
    </div><!--/copyright-->
</div>