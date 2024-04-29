{{-- <div class="tab-pane fade active show" id="custom-tabs-four-home"
                                                    role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">

                                                    <form action="{{route('store_cp', ['project_id'=> request()->project_id , 'site_id' => request()->site_id ])}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                    {{-- start code editor --}}
                                                    <input type="hidden" name="task_type" value="c_p">
                                                    <label class="d-block my-3"><strong>Your Content </strong><span class="text-warning">*</span>
                                                        <i class="ml-1 mr-1" data-fa-i2svg=""><svg style="width: 15px" class="svg-inline--fa fa-long-arrow-alt-right fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M313.941 216H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h301.941v46.059c0 21.382 25.851 32.09 40.971 16.971l86.059-86.059c9.373-9.373 9.373-24.569 0-33.941l-86.059-86.059c-15.119-15.119-40.971-4.411-40.971 16.971V216z"></path></svg></i>
                                                        <span>
                                                            Must be a minimum of <strong class="text-facebook font-weight-bold">250 words</strong>,
                                                            include up to <strong class="text-facebook font-weight-bold">3 links</strong> and
                                                        </span>
                                                    <span class="text-danger">don't add any images in your article</span>

                                                    </label>
                                                    {{-- <div  id="summernote">Hello Summernote</div> --}}

                                                    <textarea id="summernote" class="my-3" name="task_editor_data">Hello Summernote</textarea>
                                                    {{-- end code editor --}}

                                                    {{--  --}}
                                                    <div class="form-group row no-gutters my-2">
                                                        <div class="col">
                                                            <label class="d-block "><strong>Target Url </strong><span class="text-danger">* <strong class="text-success">(Enter the URL that you have included in your content above.)</strong></span>
                                                                <span class="text-facebook" data-html="true" data-content="Enter the URL that you have included in your content above." data-placement="right" data-toggle="popover" data-container="body" data-trigger="hover" data-original-title="" title="" data-fa-i2svg="">
                                                                    <svg style="width: 15px" class="svg-inline--fa fa-info-circle fa-w-16" data-html="true" data-content="Enter the URL that you have included in your content above." data-placement="right" data-toggle="popover" data-container="body" data-trigger="hover" data-original-title="" title="" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                    <path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
                                                                </svg></span>
                                                                <input type="text" name="task_target_url" value="" autocomplete="off" class="form-control  mt-2" id="targetUrl" placeholder="Enter Your Target URL" required="">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    {{--  --}}

                                                    {{--  --}}
                                                    <div class="form-group row no-gutters my-2">
                                                        <div class="col">
                                                            <label class="d-block "><strong>Anchor Text  </strong><span class="text-danger">* <strong class="text-success">(Enter the Anchor Text that you have included in your content above.)</strong></span>
                                                                <span class="text-facebook" data-html="true" data-content="Enter the URL that you have included in your content above." data-placement="right" data-toggle="popover" data-container="body" data-trigger="hover" data-original-title="" title="" data-fa-i2svg="">
                                                                    <svg style="width: 15px" class="svg-inline--fa fa-info-circle fa-w-16" data-html="true" data-content="Enter the URL that you have included in your content above." data-placement="right" data-toggle="popover" data-container="body" data-trigger="hover" data-original-title="" title="" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                    <path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
                                                                </svg></span>
                                                                <input type="text" name="task_anchor_text" value="" autocomplete="off" class="form-control  mt-2" id="targetUrl" placeholder="Enter Your Anchor Text" required="">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    {{--  --}}

                                                    {{--  --}}
                                                    <div class="form-group row no-gutters my-2">
                                                        <div class="col">
                                                            <label class="d-block "><strong>Special requirements <span class="text-success">(If necessary, Write all your task requirements here, e. g., content requirements, Category, deadline, necessity of disclosure, preferences regarding content placement, etc.)</span></strong>
                                                                <svg style="width: 15px" class="svg-inline--fa fa-info-circle fa-w-16 text-facebook" data-html="true" data-content="If necessary, Write all your task requirements here, e. g., content requirements, Category, deadline, necessity of disclosure, preferences regarding content placement, etc." data-placement="right" data-toggle="popover" data-container="body" data-trigger="hover" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" data-original-title="" title=""><path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path></svg><!-- <span class="fas fa-info-circle text-facebook" data-html="true" data-content="If necessary, Write all your task requirements here, e. g., content requirements, Category, deadline, necessity of disclosure, preferences regarding content placement, etc." data-placement="right" data-toggle="popover" data-container="body" data-trigger="hover">
                                                                </span> Font Awesome fontawesome.com -->
                                                                <textarea name="task_special_requirement" class="form-control  mt-2" rows="8"></textarea>
                                                            </label>
                                                                                                </div>
                                                    </div>
                                                    {{--  --}}

                                                    {{--  --}}
                                                    <div class="text-right text-facebook h5"> <strong>$9.93</strong></div>
                                                    {{--  --}}

                                                    {{--  --}}
                                                    <div class="row no-gutters float-right">
                                                        <div>
                                                            <button class="btn" type="submit" style="background-color:#3c5a99; color:white">Order Now</button>
                                                        </div>
                                                    </div>
                                                    {{--  --}}
                                                </form>
                                                </div> --}}



                                                'Dubai Weekly',$600,62,1,'News','3 Days','N','Y',Y,MIDDLE EAST
                                                'The Influence Journal',$600,60,5,'News','3 Days','N','Y',Y,'GLOBAL'
                                                'Elite Music 'News'',$600,51,17,Music,'1-3 Days','N','Y',Y,'GLOBAL'
                                                'West Hollywood Weekly',$600,56,19,Lifestyle,'3-5 Days','N','Y',Y,'CALIFORNIA'
                                                'Huff Mag',$600,62,33,'News',1 Day,'N','Y','N','GLOBAL'
                                                'The Beverly Weekly',$600,62,38,Lifestyle,'3-5 Days','N','Y',Y,'CALIFORNIA'
                                                'Elite Property 'News'',$600,60,42,Real Estate,'3-5 Days','N','Y',Y,'GLOBAL'
                                                'The Influential',$600,62,42,Lifestyle,'3 Days','N','Y',Y,'GLOBAL'
                                                'Elite Luxury 'News'',$600,62,42,Luxury,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                'Broke & Chic',$600,35,45,'News','1-'3 Days'','N','Y',M,'GLOBAL'
                                                'Muzique Magazine',$600,55,53,Music,'1-'3 Days'','N','Y',Y,'GLOBAL'
                                                'Mark Meets',$600,68,72,Music,'3-5 Days','N','Y',Y,UNITED KINGDOM
                                                'Luxury Travel Magazine',$600,53,71,Lifestyle,'3-5 Days','N','Y',Y,UNITED STATES
                                                'The Bragging Mommy',$600,37,51,Lifestyle,'3-5 Days','N','Y',Y,UNITED STATES
                                                'Curious Mind Magazine',$600,64,56,'News','3-5 Days','N','Y',Y,UNITED STATES
                                                ''News' Today',$600,66,31,'News','3-5 Days','N','Y',Y,UNITED KINGDOM
                                                'Kivo Daily',$750,37,63,'News',1-2 Days,'N','Y',Y,'GLOBAL'
                                                'Market Business 'News'',$750,71,77,Business,'3 Days','N','Y','N','GLOBAL'
                                                'The UBJ' ,$750,60,55,'News','1-'3 Days'','N','Y','N','GLOBAL'
                                                'ABC Money',$750,67,59,'News','3-5 Days','N','Y',Y,UNITED KINGDOM
                                                'The Daily UW',$750,61,72,'News','3-5 Days','N','Y',Y,UNITED STATES
                                                'Ritz Herald 'News'',$750,57,67,'News','1-'3 Days'','N','Y',Y,'GLOBAL'
                                                'Political Anthropologist',$750,22,14,Political,'1-'3 Days'','N','Y',Y,EUROPE
                                                'All China Review',$750,30,22,'News','1-'3 Days'','N','Y',Y,CHINA
                                                'Fairmont Post',$750,17,34,'News','1-'3 Days'','N','Y',Y,UNITED STATES
                                                'Lincoln Citizen',$750,52,34,'News','1-'3 Days'','N','Y',Y,UNITED STATES
                                                'Belmont Star',$750,52,35,'News','1-'3 Days'','N','Y',Y,UNITED STATES
                                                'Madison Graph',$750,51,39,'News','1-'3 Days'','N','Y',Y,UNITED STATES
                                                'Hudson Weekly',$750,54,49,'News','1-'3 Days'','N','Y',Y,UNITED STATES
                                                'Markets Herald',$750,56,59,Business,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                European Financial Review,$750,46,62,Business,'1-'3 Days'','N','Y',Y,EUROPE
                                                Big Time Daily,$750,54,64,'News',5 Days,'N','Y',Y,UNITED STATES
                                                Psychreg,$750,51,73,Lifestyle,'3 Days','N','Y',Y,UNITED STATES
                                                World Financial Review,$750,49,73,Business,'1-'3 Days'','N','Y',Y,'GLOBAL'
                                                European Business Review,$750,56,79,Business,'1-'3 Days'','N','Y',Y,EUROPE
                                                Now Hip Hop,$750,20,8,Music,'1-'3 Days'','N','Y',Y,'GLOBAL'
                                                Meditech Today,$750,56,13,Tech,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                Biz Dispatch,$750,55,20,Business,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                Online World Herald,$750,54,24,'News','1-'3 Days'','N','Y',Y,UNITED STATES
                                                International Releases,$750,54,25,'News','1-'3 Days'','N','Y',Y,UNITED STATES
                                                Trading Herald,$750,51,25,Business,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                Asset Digest,$750,53,28,'News','1-'3 Days'','N','Y',Y,UNITED STATES
                                                Wealth Tribune,$750,54,28,'News','1-'3 Days'','N','Y',Y,UNITED STATES
                                                Palm Bay Herald,$750,51,28,'News','1-'3 Days'','N','Y',Y,UNITED STATES
                                                Economy Standard,$750,54,29,Business,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                Luxury Advisor,$750,54,29,'News','1-'3 Days'','N','Y',Y,UNITED STATES
                                                Blockchain Tribune,$750,54,30,Web 3,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                The Luxe Insider,$750,28,30,Luxury,'1-'3 Days'','N','Y',Y,'GLOBAL'
                                                Startup Observer,$750,57,31,Business,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                Fintech Herald,$750,55,36,Business,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                Smartech Daily,$750,56,45,Tech,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                Brands Journal,$750,53,46,Business,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                LA Guest List,$750,40,46,'News','3 Days','N','Y','N',LOS ANGELES
                                                Companies Digest,$750,56,48,Business,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                Business Express,$750,62,48,Business,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                Cultr Magazine,$750,34,48,Music,1-2 Days,'N','Y',Y,'GLOBAL'
                                                Financial Tech Times,$750,56,50,Tech,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                Entrepreneur Tribune ,$750,52,52,Business,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                Transit Tomorrow,$750,57,57,'News','1-'3 Days'','N','Y',Y,UNITED STATES
                                                Technology Dispatch,$750,54,59,Tech,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                Block Telergaph,$750,38,63,Crypto,1 Week,'N','Y',Y,'GLOBAL'
                                                Chiang Rai Times,$750,80,70,'News','3-5 Days','N','Y','N','GLOBAL'
                                                Hype Magazine,$750,64,72,Lifestlye,'3 Days','N','Y',Y,'GLOBAL'
                                                Highest Networth Magazine,$750,1,34,Business,'3-5 Days','N','Y',Y,UNITED STATES
                                                San Francisco Tribune,$750,53,61,'News','3-5 Days','N','Y',Y,'CALIFORNIA'
                                                Los Angeles Tribune,$750,29,60,'News','3-5 Days','N','Y',Y,'CALIFORNIA'
                                                Healthcare Business Today,$750,45,73,'News','3-5 Days','N','Y',Y,UNITED STATES
                                                Kellys Thoughts On Things,$750,48,66,Lifestyle,'3-5 Days','N','Y',Y,UNITED STATES
                                                Off The MRKT,$750,33,58,'News','3-5 Days','N','Y',Y,UNITED STATES
                                                Now Entertainment ,$875,62,35,'News' ,'3 Days','N','Y',Y,'GLOBAL'
                                                Music 'News',$875,66,72,Music ,'3 Days','N','Y','N','GLOBAL'
                                                Mom The Mag,$1,200,56,35,Lifestyle,'1-'3 Days'','N','Y','N',UNITED STATES
                                                Young Health Magazine,$1,200,53,44,Lifestyle,2-'3 Days','N','Y',Y,UNITED STATES
                                                Science World Report,$1,200,65,67,'News','1-'3 Days'','N','Y',Y,UNITED STATES
                                                MSN,$1,200,94,92,'News','1-'3 Days'','N',M,'Y',UNITED STATES
                                                EDM Sauce,$1,200,76,60,Music,'3 Days','N','Y','N','GLOBAL'
                                                We Rave You,$1,200,52,62,Music,1 Week,'N','Y','N','GLOBAL'
                                                Deadline New ,$1,200,74,68,'News','3 Days','N','Y','N','GLOBAL'
                                                Magnetic Mag,$1,200,75,70,Music ,'3 Days','N','Y','N','GLOBAL'
                                                IB Times (AP),$1,200,73,72,Business ,1 Week,'N','Y','N',ASIA PACIFIC
                                                AllHipHop,$1,200,73,73,Music ,'3 Days','N','Y','N','GLOBAL'
                                                Zycrypto,$1,200,51,73,Crypto,'3 Days','Discreet','Y','N','GLOBAL'
                                                The Source,$1,200,82,75,Music ,1 Week,'N','Y','N',UNITED STATES
                                                Art Daily,$1,200,65,79,Entertainment,'1-'3 Days'','N','Y',Y,'GLOBAL'
                                                Good Men Project,$1,200,82,79,'News',1 Week,Y/N,'Y',Y,'GLOBAL'
                                                SA Promo,$1,200,38,33,'News','3-5 Days','N','Y',Y,AFRICA
                                                Australian Times,$1,200,56,55,'News','3-5 Days','N','Y',Y,AUSTRALIA
                                                Adapt Network,$1,200,72,71,'News','3-5 Days','N','Y',Y,UNITED STATES
                                                Home Town Station,$1,200,66,75,'News','3-5 Days','N','Y',Y,UNITED STATES
                                                The Up Coming,$1,200,65,72,'News','3-5 Days','N','Y',Y,UNITED KINGDOM
                                                I Love South Africa,$1,200,18,56,'News','3-5 Days','N','Y',Y,AFRICA
                                                Deal Magazine,$1,500,58,3.1,'News','3-5 Days',Discrete,'Y','N','GLOBAL'
                                                Rap Reviews,$1,500,50,44,Music,'1-'3 Days'','N','Y',Y,'GLOBAL'
                                                CelebMix,$1,500,63,64,Lifestyle,'3 Days','N','Y','N','GLOBAL'
                                                EarMilk,$1,500,60,72,Music,1 Week,'N','Y','N','GLOBAL'
                                                Digital Music 'News',$1,500,76,77,Music ,1 Week,'N','Y','N','GLOBAL'
                                                Philly Voice,$1,500,79,78,'News','3-5 Days','Y',Y,'Y',PHILADELPHIA
                                                Washington Independent,$1,500,61,71,'News','3-5 Days','N','Y',Y,WASHINGTON DC
                                                The Santa Clarita Valley Signal,$1,500,76,75,'News','3-5 Days','N','Y',Y,'CALIFORNIA'
                                                Motor Times,$1,800,6,1,'News','1-'3 Days'','N','Y',Y,UNITED STATES
                                                Money Times,$1,800,28,30,Business,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                Lawyer Herald,$1,800,52,41,'News','1-'3 Days'','N','Y',Y,UNITED STATES
                                                Game n Guide,$1,800,63,50,Gaming,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                KPop Starz,$1,800,82,62,Music,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                University Herald,$1,800,64,66,'News','1-'3 Days'','N','Y',Y,UNITED STATES
                                                Parents Herald,$1,800,62,66,'News','1-'3 Days'','N','Y',Y,UNITED STATES
                                                Street Insider,$1,800,83,80,'News','1-'3 Days'','Discreet','Y','N',UNITED STATES
                                                Science Times,$1,800,64,76,Tech,2-'3 Days','N','Y',Y,UNITED STATES
                                                Khaleej Times,$1,800,87,83,'News','1-'3 Days'','N','Y',Y,UAE
                                                VC Post,$1,800,63,60,'News','1-'3 Days'','N','Y','N','GLOBAL'
                                                Latin Post,$1,800,66,71,'News' ,'1-'3 Days'','N','Y','N',LATIN AMERICA
                                                Latitude 33 Magazine,$1,800,5,2.5,Real Estate,1 Week,'N','Y',Y,'CALIFORNIA'
                                                Coastal Real Estate Guide,$1,800,19,22,Real Estate,1 Week,'N','Y',Y,'CALIFORNIA'
                                                Billboard Argentina,$1,800,37,27,Music,'3 Days','N','Y','N',ARGENTINA
                                                Newport Beach Magazine,$1,800,32,38,'News',1 Week,'N','Y',Y,'CALIFORNIA'
                                                Laguna Beach Magazine,$1,800,27,39,'News',1 Week,'N','Y',Y,'CALIFORNIA'
                                                Newport Beach Independent,$1,800,43,57,'News',1 Week,'N','Y',Y,'CALIFORNIA'
                                                Neon Music,$1,800,63,58,Music,'3-5 Days','N','Y',Y,'GLOBAL'
                                                Laguna Beach Independent,$1,800,53,58,'News',1 Week,'N','Y',Y,'CALIFORNIA'
                                                Notion Online,$1,800,45,63,'News',1 Week,'N','Y','N','GLOBAL'
                                                Dancing Astronaut,$1,800,62,67,Music,'3 Days','N','Y','N','GLOBAL'
                                                California Business Journal,$1,800,40,70,'News',1 Week,'N','Y',Y,'CALIFORNIA'
                                                Finance Digest,$1,800,64,71,'News','3-5 Days','N','Y',Y,UNITED STATES
                                                Fintech Finance 'News',$1,800,39,73,Business,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                Fashion Week Daily,$1,800,69,74,Fashion,'1-'3 Days'','N','Y','N','GLOBAL'
                                                Digital Journal (Contributor),$1,800,87,87,'News','1-'3 Days'','N','Y',Y,'GLOBAL'
                                                Yahoo 'News'/Finance (AccessWire),$1,800,93,92,'News',1 Day,'Discreet','Y','N','GLOBAL'
                                                Retail Insider,$2,100,57,74,Fashion,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                Super Crypto 'News',$2,100,33,41,Crypto,'3-5 Days','Discreet','Y','N','GLOBAL'
                                                Global Banking & Finance,$2,100,81,79,Business,'3-5 Days','N','Y','N',UNITED STATES
                                                Business Insider and Yahoo (Press Release),$2,100,94,92,Business,1 Week,'Discreet','Y','N','GLOBAL'
                                                AP 'News',$2,100,92,91,'News',1 Week,'Discreet','Y','N','GLOBAL'
                                                HackerNoon,$2,100,87,88,Tech/Crypto,1 Week,'N','Y','N','GLOBAL'
                                                Lyrical Lemonade,$2,400,51,60,Music,2-3 Weeks,'N','Y','N','GLOBAL'
                                                CoinPedia,$2,400,48,74,Crypto,'3 Days','Discreet','Y','N','GLOBAL'
                                                CEO World Biz (Contributor),$2,400,71,77,Business,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                Live Mint,$2,400,91,88,'News','3-5 Days','Discreet','Y','N',INDIA
                                                The Guide,$2,550,28,16,'News','3-5 Days','N','Y',Y,DELAWARE
                                                Courier Hub,$2,550,23,25,'News','3-5 Days','N','Y',Y,WISCONSIN
                                                Fitchburg Star,$2,550,24,25,'News','3-5 Days','N','Y',Y,WISCONSIN
                                                Oregon Observer,$2,550,28,27,'News','3-5 Days','N','Y',Y,WISCONSIN
                                                Sheboygan Sun,$2,550,32,28,'News','3-5 Days','N','Y',Y,WISCONSIN
                                                Cannon Falls Beacon,$2,550,23,31,'News','3-5 Days','N','Y',Y,MINNESOTA
                                                Colchester Sun,$2,550,29,31,'News','3-5 Days','N','Y',Y,VERMONT
                                                I Want The 'News',$2,550,38,32,'News','3-5 Days','N','Y',Y,WISCONSIN
                                                Gazette Leader,$2,550,26,36,'News','3-5 Days','N','Y',Y,VIRGINIA
                                                The Flume,$2,550,42,36,'News','3-5 Days','N','Y',Y,COLORADO
                                                Queen Creek Sun Times,$2,550,23,37,'News','3-5 Days','N','Y',Y,ARIZONA
                                                Hastings Star Gazette,$2,550,46,38,'News','3-5 Days','N','Y',Y,MINNESOTA
                                                Las Vegas Optic,$2,550,44,42,'News','3-5 Days','N','Y',Y,NEW MEXICO
                                                Essex Reporter,$2,550,33,42,'News','3-5 Days','N','Y',Y,VERMONT
                                                Milton Independent,$2,550,38,45,'News','3-5 Days','N','Y',Y,VERMONT
                                                The Chaffee County Times,$2,550,41,45,'News','3-5 Days','N','Y',Y,COLORADO
                                                City Sun Times,$2,550,31,47,'News','3-5 Days','N','Y',Y,ARIZONA
                                                Verona Press,$2,550,39,49,'News','3-5 Days','N','Y',Y,WISCONSIN
                                                Ripon Press,$2,550,40,50,'News','3-5 Days','N','Y',Y,WISCONSIN
                                                Star Observer,$2,550,53,52,'News','3-5 Days','N','Y',Y,WISCONSIN
                                                The Mountain Mail,$2,550,50,55,'News','3-5 Days','N','Y',Y,COLORADO
                                                Saint Albans Messenger,$2,550,46,56,'News','3-5 Days','N','Y',Y,VERMONT
                                                Business Insider Africa,$2,700,94,92,'News',1 Week,'N','Y','N',AFRICA
                                                Contrast Magazine,$2,700,30,3.7,'News','3-5 Days','N','Y','N','GLOBAL'
                                                Metropolitan Design Magazine,$2,700,13,16,Lifestyle,'1-'3 Days'','N','Y',Y,'GLOBAL'
                                                Irvine Weekly,$2,700,35,50,'News',1 Day,'Discreet','Y','N',IRVINE
                                                Athletech'News',$2,700,26,54,Sports,'3-5 Days','N','Y',Y,'CALIFORNIA'
                                                Nob Hill Gazzette,$2,700,45,63,'News',1 Week,'N','Y',Y,'CALIFORNIA'
                                                Upscale Living,$2,700,70,65,Lifestyle,'1-'3 Days'','N','Y',Y,'GLOBAL'
                                                Sheen Magazine,$2,700,44,69,Lifestyle,'1-'3 Days'','N','Y',Y,'GLOBAL'
                                                Financial Feeds,$2,700,49,71,Business,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                Cryptopolitan,$2,700,51,74,Crypto,'3 Days','Discreet','Y','N','GLOBAL'
                                                Grit Daily,$2,700,67,74,'News','3 Days' ,'N','Y','N','GLOBAL'
                                                The South African ,$2,700,79,75,'News' ,1 Week,'N','Y',Y,SOUTH AFRICA
                                                Flaunt Magazine,$2,700,68,75,Music,1-2 Weeks,'N','Y',Y,LOS ANGELES
                                                SF Weekly,$2,700,73,80,'News','1-'3 Days'','N','Y',Y,'CALIFORNIA'
                                                SF Examiner,$2,700,82,80,'News','1-'3 Days'','N','Y',Y,'CALIFORNIA'
                                                Hot New Hip Hop (Contributor),$3,000,85,76,Music,'1-'3 Days'','N','Y',Y,'GLOBAL'
                                                Daily Press,$3,000,78,77,'News','3-5 Days','Discreet','Y','N'',NEW YORK'
                                                The Morning Call,$3,000,81,80,'News','3-5 Days','Discreet','Y','N',PENNSYLVANIA
                                                Pilot Online,$3,000,75,81,'News','3-5 Days','Discreet','Y','N',VIRGINIA
                                                Courant,$3,000,83,83,'News','3-5 Days','Discreet','Y','N',CONNECTICUT
                                                Sun Sentinel,$3,000,88,85,'News','3-5 Days','Discreet','Y','N',FLORIDA
                                                Orlando Sentinel,$3,000,87,85,'News','3-5 Days','Discreet','Y','N',FLORIDA
                                                Baltimore Sun,$3,000,90,87,'News','3-5 Days','Discreet','Y','N',MARYLAND
                                                NY Daily 'News',$3,000,93,89,'News','3-5 Days','Discreet','Y','N'',NEW YORK'
                                                Chicago Tribune,$3,000,92,91,'News','3-5 Days','Discreet','Y','N',ILLINOIS
                                                Front Page Detectives,$3,000,33,25,'News','1-'3 Days'','N','Y',Y,'GLOBAL'
                                                The Royal Observer,$3,000,31,25,'News','1-'3 Days'','N','Y',Y,'GLOBAL'
                                                Womens Golf Journal,$3,000,28,30,'News','1-'3 Days'','N','Y',Y,'GLOBAL'
                                                Morning Honey,$3,000,29,34,'News','1-'3 Days'','N','Y',Y,'GLOBAL'
                                                River Falls Journal,$3,000,50,41,'News','3-5 Days','N','Y',Y,WISCONSIN
                                                Republican Eagle,$3,000,56,47,'News','3-5 Days','N','Y',Y,MINNESOTA
                                                Pasadena Magazine,$3,000,40,47,'News',1 Week,'N','Y',Y,'CALIFORNIA'
                                                Herald Democrat,$3,000,60,59,'News','3-5 Days','N','Y',Y,TEXAS
                                                Swagger Magazine,$3,000,62,63,'News',1-2 Weeks,'N','Y',Y,UNITED STATES
                                                Galore Magazine,$3,000,78,66,Lifestyle,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                Orange Coast Magazine,$3,000,55,68,'News',1 Week,'N','Y',Y,'CALIFORNIA'
                                                Female First,$3,000,78,74,'News','1-'3 Days'','N','Y','N',UNITED KINGDOM
                                                U.Today,$3,000,53,76,Crypto,1 Week,'Discreet','Y','N','GLOBAL'
                                                Times of Malta,$3,000,77,79,'News','3-5 Days','Discreet','Y',Y,EUROPE
                                                Dallas Observer,$3,000,78,79,'News','3 Days','Y',Y,'Y',TEXAS
                                                Bitcoinist,$3,000,81,80,Crypto,'1-'3 Days'','Discreet','Y',Y,'GLOBAL'
                                                West Word,$3,000,77,81,'News','3 Days','Y',Y,'Y',DENVER
                                                Miami New Times,$3,000,80,81,'News','3 Days','Y',Y,'Y',MIAMI
                                                'News'BTC,$3,000,81,81,Crypto,'1-'3 Days'','Discreet','Y',Y,'GLOBAL'
                                                Broadway World,$3,000,86,87,Music,'1-'3 Days'','N','Y','N','GLOBAL'
                                                Q Magazine,$3,000,64,61,'News','1-'3 Days'','N','Y',Y,'GLOBAL'
                                                San Diego Reader,$3,000,75,76,'News','3 Days','N','Y',Y,'CALIFORNIA'
                                                Bust Magazine,$2,200,73,73,'News','1-'3 Days'','Discreet','Y','N','GLOBAL'
                                                LA Weekly,$2,200,76,84,'News',1 Day,'Discreet','Y','N',LOS ANGELES
                                                Fast Company Africa,$2,200,36,42,'News',1 Week,'Discreet','Y','N',AFRICA
                                                CoinSpeaker,$2,200,73,76,Crypto,'3 Days','Discreet','Y','N','GLOBAL'
                                                FXStreet,$2,200,79,79,Crypto,'3-5 Days','Discreet','Y','N','GLOBAL'
                                                SoCal Design Magazine,$2,400,10,5,'News','3 Days','N','Y',Y,'CALIFORNIA'
                                                Haute Time,$2,400,57,50,Luxury,1-2 Weeks,'Discreet','Y',Y,'GLOBAL'
                                                Haute Residence,$2,400,49,64,Luxury,1-2 Weeks,'Discreet','Y',Y,'GLOBAL'
                                                Haute Beauty,$2,400,78,77,Lifestyle ,1-2 Weeks,'Discreet','Y',Y,FLORIDA
                                                Haute Living ,$2,400,78,77,'News',1 Week,'Discreet','Y',Y,MIAMI
                                                Phoenix New Times,$2,400,74,79,'News','3 Days','Y',Y,'Y',ARIZONA
                                                Daily Caller,$2,400,88,82,'News','1-'3 Days'','N','Y',Y,WASHINGTON
                                                Inquirer,$2,400,89,84,'News','3-5 Days','Discreet','Y','N',PHILIPPINES
                                                Washington Times,$2,400,90,86,'News',1 Week,'Y',Y,'Y',WASHINGTON
                                                JPost,$2,400,91,87,'News',1 Week,'Discreet','Y',Y,JERUSALEM
                                                Aspen Peak Magazine,$2,600,17,41,Luxury,1-2 Weeks,'N','Y','N',COLORADO
                                                Mensbook,$2,600,28,45,Lifestlye,1-2 Weeks,'Discreet','Y','N',ILLINOIS
                                                Modern Luxury Scottsdale,$2,600,17,55,Luxury,1-2 Weeks,'N','Y','N',ARIZONA
                                                ML Houston Magazine,$2,600,20,56,'News',1-2 Weeks,'Discreet','Y',Y,TEXAS
                                                Dallas Magazine,$2,600,19,56,'News',1-2 Weeks,'Discreet','Y','N',TEXAS
                                                San Diego Magazine,$2,600,25,56,'News',1-2 Weeks,'Discreet','Y',Y,'CALIFORNIA'
                                                Miami Magazine,$2,600,30,58,Luxury,1-2 Weeks,'Discreet','Y','N',FLORIDA
                                                The Atlantan Magazine,$2,600,29,59,Luxury,1-2 Weeks,'N','Y','N',GEORGIA
                                                Jezebel Magazine,$2,600,28,59,Luxury,1-2 Weeks,'Discreet','Y','N',GEORGIA
                                                Capitol File Magazine,$2,600,51,60,Luxury,1-2 Weeks,'N','Y','N',WASHINGTON STATE
                                                LA Confidential ,$2,600,58,62,Lifestlye,1-2 Weeks,'Discreet','Y','N',LOS ANGELES
                                                Modern Luxury Angeleno,$2,600,31,62,'News',1-2 Weeks,'Discreet','Y','N','CALIFORNIA'
                                                Hamptons Magazine,$2,600,55,63,Luxury,1-2 Weeks,'Discreet','Y','N'',NEW YORK'
                                                Vegas Magazine ,$2,600,54,65,Lifestlye,1-2 Weeks,'Discreet','Y','N',ARIZONA
                                                San Francisco Magazine,$2,600,36,67,Lifestlye,1-2 Weeks,'Discreet','Y','N',SAN FRANCISCO
                                                Ocean Drive ,$2,600,67,72,Lifestlye,1-2 Weeks,'Discreet','Y','N',MIAMI
                                                Gotham Magazine ,$2,600,62,73,Lifestlye,1-2 Weeks,'Discreet','Y','N'',NEW YORK'
                                                Aspen Peak Magazine,$2,600,17,41,'News',1-2 Weeks,'Discreet','Y','N',COLORADO
                                                Aspen Magazine ,$2,600,17,54,Luxury,1-2 Weeks,'Discreet','Y','N',COLORADO
                                                Manhattan Magazine,$2,600,25,56,'News',1-2 Weeks,'Discreet','Y','N'',NEW YORK'
                                                Crypto 'News',$2,600,61,81,Crypto,'3 Days','Discreet','Y',Y,'GLOBAL'
                                                Tech Times,$2,600,82,84,Technology ,1 Week,'N','Y',Y,'GLOBAL'
                                                IB Times (UAE),$2,600,12,14,'News',1-2 Weeks,'Y',Y,'N',UAE
                                                IB Times (JP),$2,600,45,31,'News','3-5 Days','Y',Y,'N',JAPAN
                                                My Aggie Nation,$2,600,41,32,'News',1 Week,'N','Y',Y,TEXAS
                                                The Casper Journal,$2,600,44,39,'News',1 Week,'N','Y',Y,WYOMING
                                                Wahoo Ashland Wavely,$2,600,40,43,'News',1 Week,'N','Y',Y,NEBRASKA
                                                Franklin 'News' Post,$2,600,46,45,'News',1 Week,'N','Y',Y,VIRGINIA
                                                The 'News' Virginian,$2,600,48,47,'News',1 Week,'N','Y',Y,VIRGINIA
                                                The Muscatine Journal,$2,600,59,55,'News',1 Week,'N','Y',Y,IOWA
                                                SWVA Today,$2,600,53,56,'News',1 Week,'N','Y',Y,VIRGINIA
                                                Lake Geneva Regional,$2,600,49,57,'News',1 Week,'N','Y',Y,WISCONSIN
                                                Culpeper Star-Exponent,$2,600,55,62,'News',1 Week,'N','Y',Y,VIRGINIA
                                                The Morganton 'News' Herald,$2,600,58,62,'News',1 Week,'N','Y',Y,NOTH CAROLINA
                                                The North Platte Telegraph,$2,600,58,62,'News',1 Week,'N','Y',Y,NEBRASKA
                                                Ravali Republic,$2,600,56,64,'News',1-3 Day,'N','Y',Y,MONTANA
                                                Martinsville Bulletin,$2,600,57,64,'News',1 Week,'N','Y',Y,VIRGINIA
                                                Benzinga,$2,600,87,86,Crypto/'News',1 Week,'N','Y',Y,UNITED STATES
                                                San Antonio Current,$2,600,74,75,'News','3-5 Days','N','Y','N',TEXAS
                                                Creative Loafing Tampa Bay,$2,600,73,73,'News','3-5 Days','N','Y','N',FLORIDA
                                                Orlando Weekly,$2,600,76,74,'News','3-5 Days','N','Y','N',FLORIDA
                                                Citybeat,$2,800,64,74,'News','1-'3 Days'','N','Y',Y,OHIO
                                                Riverfront Times,$2,800,73,78,'News','1-'3 Days'','N','Y',Y,MISSOURI
                                                Metro Times,$2,800,76,78,'News','1-'3 Days'','N','Y',Y,MICHIGAN
                                                Dallas 'News',$2,800,89,88,'News',1 Week,'Y',Y,'N',DALLAS
                                                Coingape (Press Release),$2,800,57,75,Crypto,'3 Days','Discreet','Y','N','GLOBAL'
                                                Crypto Currency 'News',$2,800,21,9,Crypto,'3-5 Days','Discreet','Y','N','GLOBAL'
                                                L'Officiel Cyprus,$2,800,31,39,Fashion,1 Week,'N','Y',Y,'GLOBAL'
                                                Lexington Clipper-Herald,$2,800,50,46,'News',1 Week,'N','Y',Y,NEBRASKA
                                                L'Officiel Monaco,$2,800,37,50,Fashion,1 Week,'N','Y',Y,'GLOBAL'
                                                The McDowell 'News',$2,800,52,52,'News',1 Week,'N','Y',Y,NORTH CAROLINA
                                                L'Officiel Austria,$2,800,38,53,Fashion,1 Week,'N','Y',Y,'GLOBAL'
                                                KNewz,$2,800,55,54,'News','1-'3 Days'','N','Y',Y,'GLOBAL'
                                                Atlantic City Weekly,$2,800,54,54,'News',1 Week,'N','Y',Y,NEW JERSEY
                                                Mooresville Tribune,$2,800,53,56,'News',1 Week,'N','Y',Y,NORTH CAROLINA
                                                The Beatrice Daily Sun,$2,800,56,57,'News',1 Week,'N','Y',Y,NEBRASKA
                                                Statesville Record & Landmark,$2,800,60,58,'News',1 Week,'N','Y',Y,NORTH CAROLINA
                                                Coin Edition,$2,800,34,58,Crypto,'3-5 Days','Discreet','Y','N','GLOBAL'
                                                Journal Gazette & Times-Courier,$2,800,60,59,'News',1 Week,'N','Y',Y,ILLINOIS
                                                York New-Times,$2,800,59,61,'News',1 Week,'N','Y',Y,NEBRASKA
                                                Danville Register & Bee,$2,800,59,62,'News',1 Week,'N','Y',Y,VIRGINIA
                                                Chippewa Herald,$2,800,62,65,'News',1 Week,'N','Y',Y,WISCONSIN
                                                The Independent Tribune,$2,800,60,65,'News',1 Week,'N','Y',Y,NORTH CAROLINA
                                                The Columbus Telegram,$2,800,63,65,'News',1 Week,'N','Y',Y,NEBRASKA
                                                The Daily Nonpareil,$2,800,59,66,'News',1 Week,'N','Y',Y,IOWA
                                                Hickory Daily Record,$2,800,62,66,'News',1 Week,'N','Y',Y,NORTH CAROLINA
                                                Kearny Hub,$2,800,61,66,'News',1 Week,'N','Y',Y,NEBRASKA
                                                Albany Democrat-Herald,$2,800,66,67,'News',1 Week,'N','Y',Y,OREGON
                                                Harper's Bazaar Vietnam,$2,800,43,67,Lifestyle,1 Week,'N','Y',Y,'GLOBAL'
                                                Scottsbluff Star-Herald Online,$2,800,61,68,'News',1 Week,'N','Y',Y,NEBRASKA
                                                Winona Daily 'News',$2,800,61,69,'News',1 Week,'N','Y',Y,MINNESOTA
                                                Elko Daily Free Press,$2,800,64,70,'News',1 Week,'N','Y',Y,NEVEDA
                                                The Sentinel ,$2,800,69,70,'News',1 Week,'N','Y',Y,PENNSYLVANIA
                                                SC Now,$2,800,64,71,'News',1 Week,'N','Y',Y,SOUTH CAROLINA
                                                The Daily 'News',$2,800,69,71,'News',1 Week,'N','Y',Y,WASHINGTON D.C.
                                                Moline Dispatch & Rock Island Argus,$2,800,64,71,'News',1 Week,'N','Y',Y,IOWA
                                                The Southern Illinoisan,$2,800,65,71,'News',1 Week,'N','Y',Y,ILLINOIS
                                                Dothan Eagle,$2,800,66,71,'News',1 Week,'N','Y',Y,ALABAMA
                                                Corvallis Gazette Times,$2,800,67,71,'News',1 Week,'N','Y',Y,OREGON
                                                Herald & Review,$2,800,66,71,'News',1 Week,'N','Y',Y,ILLINOIS
                                                The Grand Island Independant,$2,800,69,71,'News',1 Week,'N','Y',Y,NEBRASKA
                                                IB Times (AU),$2,800,70,71,'News','3-5 Days','Y',Y,'N',AUSTRALIA
                                                The Times and Democrat,$2,800,64,71,'News',1 Week,'N','Y',Y,SOUTH CAROLINA
                                                Bristol Herald Courier,$2,800,66,72,'News',1 Week,'N','Y',Y,VIRGINIA
                                                Twin Falls Times-'News',$2,800,66,72,'News',1 Week,'N','Y',Y,IDAHO
                                                Glens Falls Post-Star,$2,800,66,72,'News',1 Week,'N','Y',Y',NEW YORK'
                                                Montana Standard,$2,800,66,72,'News',1 Week,'N','Y',Y,MONTANA
                                                The Citizen Auburn Pub ,$2,800,68,72,'News',1 Week,'N','Y',Y',NEW YORK'
                                                La Corsse Tribune,$2,800,67,73,'News',1 Week,'N','Y',Y,WISCONSIN
                                                The 'News' & Advance,$2,800,68,73,'News',1 Week,'N','Y',Y,VIRGINIA
                                                The Journal Times,$2,800,67,74,'News',1 Week,'N','Y',Y,WISCONSIN
                                                The Pantagraph,$2,800,68,74,'News',1 Week,'N','Y',Y,ILLINOIS
                                                The Free Lance-Star,$2,800,68,75,'News',1 Week,'N','Y',Y,VIRGINIA
                                                The Bismarck Tribune,$2,800,67,75,'News',1 Week,'N','Y',Y,NORTH DAKOTA
                                                Quad-City Times,$2,800,68,75,'News',1 Week,'N','Y',Y,IOWA
                                                Casper Star Tribune,$2,800,68,76,'News',1 Week,'N','Y',Y,WYOMING
                                                Gulf Times,$2,800,74,76,'News','1-'3 Days'','N','Y','N',DUBAI
                                                Crypto Potato (Press Release),$2,800,60,78,Crypto,'3 Days','Discreet','Y','N','GLOBAL'
                                                Radar Online,$2,800,81,79,Entertainment ,'1-'3 Days'','N','Y',Y,LOS ANGELES
                                                LA Mag,$2,800,83,81,'News',1 Week,'N','Y',Y,'CALIFORNIA'
                                                Review Journal,$2,800,83,85,'News','3-5 Days','Y',Y,'Y',ARIZONA
                                                Fremont Tribune,$2,800,60,63,'News',1 Week,'N','Y',Y,NEBRASKA
                                                Opelika Auburn 'News',$2,800,71,67,'News',1 Week,'N','Y',Y,ALABAMA
                                                Globe Gazzette,$2,800,75,70,'News',1 Week,'N','Y',Y,IOWA
                                                The Eagle,$2,800,72,72,'News',1 Week,'N','Y',Y,TEXAS
                                                Kenosha 'News',$2,800,69,72,'News',1 Week,'N','Y',Y,WISCONSIN
                                                Independent Record,$2,800,70,73,'News',1 Week,'N','Y',Y,MONTANA
                                                Waterloo-Cedar Falls Courier,$2,800,75,73,'News',1 Week,'N','Y',Y,IOWA
                                                Waco Tribune-Herald,$2,800,72,74,'News',1 Week,'N','Y',Y,TEXAS
                                                Rapid City Journal,$2,800,72,74,'News',1 Week,'N','Y',Y,SOUTH DAKOTA
                                                Sioux City Journal,$2,800,73,74,'News',1 Week,'N','Y',Y,IOWA
                                                The Daily Progress,$2,800,70,76,'News',1 Week,'N','Y',Y,VIRGINIA
                                                'News' & Record,$2,800,76,76,'News',1 Week,'N','Y',Y,NORTH CAROLINA
                                                Billings Gazette,$2,800,73,77,'News',1 Week,'N','Y',Y,MONTANA
                                                The Press of Atlantic City,$2,800,73,77,'News',1 Week,'N','Y',Y,NEW JERSEY
                                                Winston-Salem Journal,$2,800,73,77,'News',1 Week,'N','Y',Y,NORTH CAROLINA
                                                Missoulian,$2,800,76,77,'News',1 Week,'N','Y',Y,MONTANA
                                                The Roanoke Times,$2,800,74,78,'News',1 Week,'N','Y',Y,VIRGINIA
                                                The Times of Northwest Indiana,$2,800,74,78,'News',1 Week,'N','Y',Y,INDIANA
                                                Lincoln Journal Star,$2,800,73,79,'News',1 Week,'N','Y',Y,NEBRASKA
                                                Tulsa World,$2,800,77,80,'News',1 Week,'N','Y',Y,OKLAHOMA
                                                Omaha World-Herald,$2,800,78,81,'News',1 Week,'N','Y',Y,NEBRASKA
                                                The Buffalo 'News',$2,800,76,82,'News',1 Week,'N','Y',Y',NEW YORK'
                                                Napa Valley Register,$2,800,79,77,'News',1 Week,'N','Y',Y,'CALIFORNIA'
                                                Richmond Times-Dispatch,$2,800,75,78,'News',1 Week,'N','Y',Y,VIRGINIA
                                                STL Today,$2,800,86,84,'News',1 Week,'N','Y',Y,MISSOURI
                                                Playboy (Netherlands),$2,800,37,38,Entertainment,'3-5 Days','N','Y',Y,NETHERLANDS
                                                Elle (Ukraine),$2,800,57,63,Fashion,1-2 Weeks,'N','Y',Y,UKRAINE
                                                World Star,$3,200,76,72,Music,'3-5 Days','N','Y',Y,'GLOBAL'
                                                CoinCodex,$3,200,54,76,Crypto,'3-5 Days','Discreet','Y','N','GLOBAL'
                                                Ambcrypto,$3,200,58,77,Crypto,'3 Days','Discreet','Y','N','GLOBAL'
                                                Village Voice ,$3,200,84,82,'News',1 Day,'Discreet','Y','N'',NEW YORK'
                                                Mashable (NL),$3,200,93,91,'News','3-5 Days','N','Y',Y,NETHERLANDS
                                                Bristol Post UK,$3,400,81,77,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                Birmingham Mail UK,$3,400,89,80,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                Daily Record UK,$3,400,85,81,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                Liver Pool Echo UK,$3,400,88,81,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                Wales Online UK,$3,400,90,82,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                Manchester Evening 'News' UK,$3,400,89,83,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                Irish Star,$3,400,42,46,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                Aberdeen Live,$3,400,41,53,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                Cork Beo,$3,400,51,59,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                Edinburgh Live,$3,400,65,71,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                Football London,$3,400,79,73,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                Teesside Live,$3,400,77,74,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                Yorkshire Live,$3,400,78,74,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                Belfast Live,$3,400,81,74,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                Hull Live,$3,400,81,74,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                Devon Live,$3,400,80,75,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                Leicester Mercury,$3,400,77,76,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                My London,$3,400,80,77,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                Chronicle Live,$3,400,86,79,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                Hollywood Unlocked,$3,400,65,54,Enterainment ,'3 Days','N','Y',Y,LOS ANGELES
                                                IB Times (UK),$3,400,89,83,'News','3-5 Days','N','Y','N',UNITED KINGDOM
                                                Hollywood Life,$4,000,90,80,Lifestyle,5 Days,'N','Y',Y,'CALIFORNIA'
                                                Rolling Stone (UK),$4,000,61,67,Music,5 Days,'N','Y',Y,UNITED KINGDOM
                                                Attitude,$4,000,76,72,'News',5 Days,'N','Y',Y,UNITED KINGDOM
                                                'News'Max,$4,000,85,82,'News',1 Week,'Y',Y,'N',WASHINGTON
                                                Rum Raiders,$4,000,27,22,Alcohol,'3-5 Days','N','Y','N','GLOBAL'
                                                Tequila Raiders,$4,000,21,28,Alcohol,'3-5 Days','Discreet','Y','N','GLOBAL'
                                                Gin Raiders,$4,000,26,32,Alcohol,'3-5 Days','Discreet','Y','N','GLOBAL'
                                                Inc Australia,$4,000,29,46,'News',1-2 Weeks,'Discreet','Y','N',AUSTRALIA
                                                House & Garden Africa,$4,000,45,46,Real Estate,1 Week,'N','Y','N',AFRICA
                                                Soaps In Depth,$4,000,59,47,'News',1 Week,'N','Y',Y,'GLOBAL'
                                                Cheboygan Daily Tribune,$4,000,52,48,'News',1-2 Weeks,'N','Y',Y,MICHIGAN
                                                Reporter-Times,$4,000,51,48,'News',1-2 Weeks,'N','Y',Y,INDIANA
                                                Lincoln Courier,$4,000,53,48,'News',1-2 Weeks,'N','Y',Y,ILLINOIS
                                                Kewanee Star Courier,$4,000,48,49,'News',1-2 Weeks,'N','Y',Y,ILLINOIS
                                                Canton Daily Ledger,$4,000,51,49,'News',1-2 Weeks,'N','Y',Y,ILLINOIS
                                                Times-Mail,$4,000,53,49,'News',1-2 Weeks,'N','Y',Y,INDIANA
                                                Pontiac Daily Leader,$4,000,50,50,'News',1-2 Weeks,'N','Y',Y,ILLINOIS
                                                Tri-County Independent,$4,000,55,50,'News',1-2 Weeks,'N','Y',Y,PENNSYLVANIA
                                                Coldwater Daily Reporter,$4,000,53,51,'News',1-2 Weeks,'N','Y',Y,'CALIFORNIA'
                                                McDonough County Voice,$4,000,50,52,'News',1-2 Weeks,'N','Y',Y,ILLINOIS
                                                The Record Herald,$4,000,55,52,'News',1-2 Weeks,'N','Y',Y,PENNSYLVANIA
                                                The Gardener 'News',$4,000,42,53,'News',1-2 Weeks,'N','Y',Y,MASSACHUSETTS
                                                Sturgis Journal,$4,000,53,53,'News',1-2 Weeks,'N','Y',Y,MICHIGAN
                                                Player One,$4,000,74,53,'News','3-5 Days','Y',Y,'N',UNITED STATES
                                                Whiskey Raiders,$4,000,40,53,Alcohol,'3-5 Days','Discreet','Y','N','GLOBAL'
                                                The Sault 'News',$4,000,53,54,'News',1-2 Weeks,'N','Y',Y,MICHIGAN
                                                The Times Telegram,$4,000,51,54,'News',1-2 Weeks,'N','Y',Y',NEW YORK'
                                                Bucyrus Telegraph-Forum,$4,000,55,54,'News',1-2 Weeks,'N','Y',Y,OHIO
                                                Port Clinton 'News' Herald,$4,000,54,54,'News',1-2 Weeks,'N','Y',Y,OHIO
                                                The Daily Jeffersonian,$4,000,50,55,'News',1-2 Weeks,'N','Y',Y,OHIO
                                                Corning Leader,$4,000,57,55,'News',1-2 Weeks,'N','Y',Y',NEW YORK'
                                                Marshfield 'News' Herald,$4,000,56,55,'News',1-2 Weeks,'N','Y',Y,WISCONSIN
                                                Henderson 'News',$4,000,50,55,'News',1-2 Weeks,'N','Y',Y,KENTUCKY
                                                Ashland TImes Gazette ,$4,000,54,55,'News',1-2 Weeks,'N','Y',Y,OHIO
                                                Food and Wine Español,$4,000,49,55,LifeStyle,1-2 Weeks,'Y',Y,'N',MEXICO
                                                Hillsdale Daily 'News',$4,000,52,56,'News',1-2 Weeks,'N','Y',Y,MICHIGAN
                                                Ruidoso 'News',$4,000,53,56,'News',1-2 Weeks,'N','Y',Y,NEW MEXICO
                                                Pekin Daily Times,$4,000,55,56,'News',1-2 Weeks,'N','Y',Y,ILLINOIS
                                                Winter Haven 'News' Chief,$4,000,60,56,'News',1-2 Weeks,'N','Y',Y,FLORIDA
                                                Daily World,$4,000,55,57,'News',1-2 Weeks,'N','Y',Y,LOUISIANA
                                                Watertown Public Opinion,$4,000,56,58,'News',1-2 Weeks,'N','Y',Y,SOUTH DAKOTA
                                                Ellwood City Ledger,$4,000,54,58,'News',1-2 Weeks,'N','Y',Y,PENNSYLVANIA
                                                The Evening Tribune,$4,000,57,58,'News',1-2 Weeks,'N','Y',Y',NEW YORK'
                                                Freeport Journal Standard,$4,000,57,58,'News',1-2 Weeks,'N','Y',Y,ILLINOIS
                                                Pal-item,$4,000,58,58,'News',1-2 Weeks,'N','Y',Y,INDIANA
                                                Oakridger,$4,000,56,60,'News',1-2 Weeks,'N','Y',Y,TENNESSEE
                                                Coshocton Tribune,$4,000,57,60,'News',1-2 Weeks,'N','Y',Y,OHIO
                                                Examiner-Enterprise,$4,000,59,61,'News',1-2 Weeks,'N','Y',Y,OKLAHOMA
                                                Wisconsin Rapids Tribune,$4,000,59,61,'News',1-2 Weeks,'N','Y',Y,WISCONSIN
                                                Daily Comet,$4,000,60,61,'News',1 Week,'N','Y',Y,LOUISIANA
                                                Soap Opera Digest,$4,000,72,61,Entertainment,1 Week,'N','Y',Y,'GLOBAL'
                                                Stevens Point Journal,$4,000,57,62,'News',1-2 Weeks,'N','Y',Y,WISCONSIN
                                                Massillon Independent,$4,000,59,63,'News',1-2 Weeks,'N','Y',Y,OHIO
                                                Salina Journal,$4,000,60,63,'News',1-2 Weeks,'N','Y',Y,KANSAS
                                                Fremont 'News' Meesenger,$4,000,57,63,'News',1-2 Weeks,'N','Y',Y,OHIO
                                                Daily American Online,$4,000,57,64,'News',1-2 Weeks,'N','Y',Y,PENNSYLVANIA
                                                The Daily Telegram,$4,000,58,64,'News',1-2 Weeks,'N','Y',Y,MICHIGAN
                                                Chillicothe Gazette,$4,000,61,64,'News',1-2 Weeks,'N','Y',Y,OHIO
                                                Lancaster Eagle-Gazette,$4,000,58,65,'News',1-2 Weeks,'N','Y',Y,OHIO
                                                Galesburg Register Mail,$4,000,59,65,'News',1-2 Weeks,'N','Y',Y,ILLINOIS
                                                Daily Messenger,$4,000,60,65,'News',1-2 Weeks,'N','Y',Y',NEW YORK'
                                                The Marion Star,$4,000,61,65,'News',1-2 Weeks,'N','Y',Y,OHIO
                                                Carlsbad Current Argus,$4,000,60,66,'News',1-2 Weeks,'N','Y',Y,NEW MEXICO
                                                The Progress-Index,$4,000,60,66,'News',1-2 Weeks,'N','Y',Y,VIRGINIA
                                                Herald Times Reporter,$4,000,60,66,'News',1-2 Weeks,'N','Y',Y,WISCONSIN
                                                J-14 Magazine,$4,000,78,66,Entertainment,1 Week,'N','Y',Y,'GLOBAL'
                                                The Gadsden Times,$4,000,61,67,'News',1-2 Weeks,'N','Y',Y,ALABAMA
                                                First for Women,$4,000,60,69,Female,2-3 Weeks,'N','Y',Y,'GLOBAL'
                                                Closer Weekly,$4,000,78,70,Entertainment,1 Week,'N','Y',Y,'GLOBAL'
                                                National Enquirer,$4,000,76,70,'News','3-5 Days','N','Y',Y,'GLOBAL'
                                                Elle India,$4,000,68,70,Fashion,1 Week,'N','Y',Y,INDIA
                                                The Newport Daily 'News',$4,000,58,71,'News',1-2 Weeks,'N','Y',Y,RHODE ISLAND
                                                Women's World ,$4,000,64,71,Female ,2-3 Weeks,'N','Y',Y,'GLOBAL'
                                                Realty Biz 'News' (Contributor),$4,000,54,72,Real Estate,1-2 Weeks,'N','Y','N',UNITED STATES
                                                The Daily Advertiser,$4,000,68,73,'News',1-2 Weeks,'N','Y',Y,LOUISIANA
                                                Life & Style ,$4,000,79,73,Lifestyle ,1 Week,'N','Y',Y,UNITED STATES
                                                The Denver Gazette,$4,000,62,73,'News',1 Week,'N','Y',Y,COLORADO
                                                Cryptonomist,$4,000,51,73,Crypto,'3 Days','Discreet','Y','N','GLOBAL'
                                                In Touch Weekly,$4,000,82,74,Lifestyle ,1 Week,'N','Y',Y,'GLOBAL'
                                                Law & Crime,$4,000,80,75,Legal,'3-5 Days','Discreet','Y',Y,'GLOBAL'
                                                Realty Times (Contributor),$4,000,58,77,Real Estate,1-2 Weeks,'N','Y','N',UNITED STATES
                                                Mediate,$4,000,83,78,Alcohol,'3-5 Days','Discreet','Y','N','GLOBAL'
                                                The Gazette,$4,000,77,80,'News',1 Week,'N','Y',Y,COLORADO
                                                Smart Company Australia,$4,000,66,80,'News',1-2 Weeks,'Discreet','Y','N',AUSTRALIA
                                                Winter Haven 'News' Chief,$4,000,60,56,'News',1-2 Weeks,'N','Y',Y,FLORIDA
                                                The Alliance Review,$4,000,54,63,'News',1-2 Weeks,'N','Y',Y,OHIO
                                                Kent Ravenna Record-Courier,$4,000,55,62,'News',1-2 Weeks,'N','Y',Y,OHIO
                                                Times Reporter,$4,000,60,65,'News',1-2 Weeks,'N','Y',Y,OHIO
                                                The Daily Record,$4,000,57,66,'News',1-2 Weeks,'N','Y',Y,OHIO
                                                Myrtle Beach Sun 'News',$4,000,72,73,'News',1 Week,'Y',Y,'Y',SOUTH CAROLINA
                                                OK Magazine ,$4,000,81,75,Lifestyle ,'1-'3 Days'','N','Y',Y,LOS ANGELES
                                                Marie Claire (Netherlands),$4,000,42,60,Fashion,'3-5 Days','N','Y',Y,NETHERLANDS
                                                Harper's Bazaar (Australia),$4,000,72,73,Fashion,1 Week,'N','Y',Y,AUSTRALIA
                                                Men's Health (Australia),$4,000,62,67,Lifestyle,1-2 Weeks,'N','Y',Y,AUSTRALIA
                                                Esquire (Australia),$4,000,32,32,Fashion,1 Week,'N','Y',Y,AUSTRALIA
                                                Women's Health (Australia),$4,000,59,70,Lifestyle,1 Week,'N','Y',Y,AUSTRALIA
                                                Glamour South Africa,$4,000,57,58,Fashion,1 Week,'N','Y','N',AFRICA
                                                GQ South Africa ,$4,000,56,62,Fashion,1 Week,'N','Y','N',AFRICA
                                                Forbes Columbia ,$4,000,61,73,'News',1-2 Weeks,'Discreet','Y',Y,COLUMBIA
                                                Forbes Mexico,$4,000,89,82,'News',1-2 Weeks,'Discreet','Y','N',MEXICO
                                                Times of Israel,$4,000,91,91,'News','3-5 Days','Y',Y,'N',ISREAL
                                                Entrepreneur (India),$4,000,92,91,'News','1-'3 Days'','N','Y','N',INDIA
                                                ITP.live,$4,000,35,42,'News',1-2 Weeks,'N','Y',Y,'GLOBAL'
                                                ITP.net,$4,000,70,73,'News',1 Week,'N','Y',Y,UAE
                                                Jezebel.com,$4,000,84,82,Lifestyle,1-2 Weeks,'N','Y',Y,UNITED STATES
                                                Latin Times,$4,000,81,71,'News','3-5 Days','Y',Y,'Y',LATIN AMERICA
                                                Medical Daily,$4,000,82,81,Medical,'3-5 Days','Y',Y,'N','GLOBAL'
                                                IB Times (NA),$4,000,91,86,'News','1-'3 Days'','Y',Y,'N','GLOBAL'
                                                Robb Report Mexico,$4,000,44,56,'News',1-2 Weeks,'N','Y','N',MEXICO
                                                InStyle Mexico,$4,000,58,58,'News'/Fashion,1-2 Weeks,'N','Y','N',MEXICO
                                                Shelby Star,$4,000,60,61,'News',1-2 Weeks,'N','Y',Y,NORTH CAROLINA
                                                Chambersburg Public Opinion,$4,000,61,61,'News',1-2 Weeks,'N','Y',Y,PENNSYLVANIA
                                                Alamogordo Daily 'News',$4,000,63,62,'News',1-2 Weeks,'N','Y',Y,NEW MEXICO
                                                Hanover Evening Sun,$4,000,60,62,'News',1-2 Weeks,'N','Y',Y,PENNSYLVANIA
                                                Zanesville Times Recorder,$4,000,65,62,'News',1-2 Weeks,'N','Y',Y,OHIO
                                                Oshkosh Northwestern,$4,000,61,64,'News',1-2 Weeks,'N','Y',Y,WISCONSIN
                                                Lebanon Daily 'News',$4,000,66,64,'News',1-2 Weeks,'N','Y',Y,PENNSYLVANIA
                                                Elle Quebec,$4,000,54,64,Fashion,1 Week,'N','Y',Y,CANADA
                                                FDL Reporter,$4,000,62,65,'News',1-2 Weeks,'N','Y',Y,WISCONSIN
                                                The Daily Journal,$4,000,63,65,'News',1-2 Weeks,'N','Y',Y,NEW JERSEY
                                                Livingston Daily,$4,000,61,66,'News',1-2 Weeks,'N','Y',Y,MICHIGAN
                                                Milford Daily 'News',$4,000,61,66,'News',1-2 Weeks,'N','Y',Y,MASSACHUSETTS
                                                The Town Talk,$4,000,62,66,'News',1-2 Weeks,'N','Y',Y,LOUISIANA
                                                Sheboygan Press,$4,000,62,66,'News',1-2 Weeks,'N','Y',Y,WISCONSIN
                                                Burlington County Times,$4,000,66,66,'News',1-2 Weeks,'N','Y',Y,NEW JERSEY
                                                Columbia Daily Herald,$4,000,65,66,'News',1-2 Weeks,'N','Y',Y,TENNESSEE
                                                The Monroe 'News',$4,000,61,67,'News',1-2 Weeks,'N','Y',Y,MICHIGAN
                                                Taunton Daily Gazette,$4,000,63,67,'News',1-2 Weeks,'N','Y',Y,MASSACHUSETTS
                                                Ithaca Journal,$4,000,63,67,'News',1-2 Weeks,'N','Y',Y',NEW YORK'
                                                Hattiesburg American,$4,000,66,67,'News',1-2 Weeks,'N','Y',Y,MISSISSIPPI
                                                Leesburg Daily Commercial,$4,000,71,67,'News',1-2 Weeks,'N','Y',Y,FLORIDA
                                                Star Gazette,$4,000,61,68,'News',1-2 Weeks,'N','Y',Y',NEW YORK'
                                                The Times Herald,$4,000,66,68,'News',1-2 Weeks,'N','Y',Y,MICHIGAN
                                                The Leaf Chronicle,$4,000,70,68,'News',1-2 Weeks,'N','Y',Y,TENNESSEE
                                                Press Connects,$4,000,68,68,'News',1-2 Weeks,'N','Y',Y',NEW YORK'
                                                The Hutchinson 'News',$4,000,71,68,'News',1-2 Weeks,'N','Y',Y,KANSAS
                                                Daily 'News' Journal,$4,000,64,69,'News',1-2 Weeks,'N','Y',Y,TENNESSEE
                                                Newark Advocate,$4,000,61,70,'News',1-2 Weeks,'N','Y',Y,OHIO
                                                The Ames Tribune,$4,000,62,70,'News',1-2 Weeks,'N','Y',Y,IOWA
                                                Abilene Reporter 'News',$4,000,66,70,'News',1-2 Weeks,'N','Y',Y,TEXAS
                                                The Herald-Times,$4,000,63,70,'News',1-2 Weeks,'N','Y',Y,INDIANA
                                                Houma Today,$4,000,62,70,'News',1-2 Weeks,'N','Y',Y,LOUISIANA
                                                The 'News' Leader,$4,000,62,70,'News',1-2 Weeks,'N','Y',Y,VIRGINIA
                                                Jackson Sun,$4,000,66,70,'News',1-2 Weeks,'N','Y',Y,TENNESSEE
                                                Battle Creek Enquirer,$4,000,66,70,'News',1-2 Weeks,'N','Y',Y,MICHIGAN
                                                The Star Press,$4,000,66,70,'News',1-2 Weeks,'N','Y',Y,INDIANA
                                                VV Daily Press,$4,000,68,70,'News',1-2 Weeks,'N','Y',Y,'CALIFORNIA'
                                                Gaston Gazette,$4,000,69,70,'News',1-2 Weeks,'N','Y',Y,NORTH CAROLINA
                                                GoSanAngelo,$4,000,74,70,'News',1-2 Weeks,'N','Y',Y,TEXAS
                                                Petoskey 'News'-Review,$4,000,62,71,'News',1-2 Weeks,'N','Y',Y,MICHIGAN
                                                Beaver County Times,$4,000,63,71,'News',1-2 Weeks,'N','Y',Y,PENNSYLVANIA
                                                Times Record,$4,000,62,71,'News',1-2 Weeks,'N','Y',Y,ARKANSAS
                                                The 'News' Star,$4,000,66,71,'News',1-2 Weeks,'N','Y',Y,LOUISIANA
                                                The Spectrum,$4,000,68,71,'News',1-2 Weeks,'N','Y',Y,UTAH
                                                The Bulletin,$4,000,70,71,'News',1-2 Weeks,'N','Y',Y,CONNECTICUT
                                                Wichita Falls Times-Record-'News',$4,000,70,71,'News',1-2 Weeks,'N','Y',Y,TEXAS
                                                New Jersey Herald,$4,000,71,71,'News',1-2 Weeks,'N','Y',Y,NEW JERSEY
                                                Visalia Times-Delta,$4,000,74,71,'News',1-2 Weeks,'N','Y',Y,'CALIFORNIA'
                                                Holland Sentinel,$4,000,63,72,'News',1-2 Weeks,'N','Y',Y,MICHIGAN
                                                Utica Observer Dispatch,$4,000,64,72,'News',1-2 Weeks,'N','Y',Y',NEW YORK'
                                                Amarillo Globe-'News',$4,000,65,72,'News',1-2 Weeks,'N','Y',Y,TEXAS
                                                The Hour,$4,000,74,72,'News',1-2 Weeks,'Y',Y,'Y',CONNECTICUT
                                                Iowa City Press-Citizen,$4,000,69,72,'News',1-2 Weeks,'N','Y',Y,IOWA
                                                Panama City 'News'-Herald,$4,000,68,72,'News',1-2 Weeks,'N','Y',Y,FLORIDA
                                                The Pueblo Chieftain,$4,000,69,72,'News',1-2 Weeks,'N','Y',Y,COLORADO
                                                Enterprise 'News',$4,000,70,72,'News',1-2 Weeks,'N','Y',Y,MASSACHUSETTS
                                                Delmarva Now,$4,000,70,72,'News',1-2 Weeks,'N','Y',Y,NEW MEXICO
                                                The Telegraph,$4,000,63,73,'News',1-2 Weeks,'Y',Y,'Y',ILLINOIS
                                                Morris County Daily Record,$4,000,67,73,'News',1-2 Weeks,'N','Y',Y,NEW JERSEY
                                                Fosters Daily Democrat,$4,000,66,73,'News',1-2 Weeks,'N','Y',Y,NEW HAMPSHIRE
                                                Ocala StarBanner,$4,000,66,73,'News',1-2 Weeks,'N','Y',Y,FLORIDA
                                                Recordnet.com,$4,000,66,73,'News',1-2 Weeks,'N','Y',Y,'CALIFORNIA'
                                                Tuscaloosa 'News',$4,000,68,73,'News',1-2 Weeks,'N','Y',Y,ALABAMA
                                                GoUpstate,$4,000,68,73,'News',1-2 Weeks,'N','Y',Y,SOUTH CAROLINA
                                                Northwest Florida Daily 'News',$4,000,69,73,'News',1-2 Weeks,'N','Y',Y,FLORIDA
                                                St. Cloud Times,$4,000,71,73,'News',1-2 Weeks,'N','Y',Y,MINNESOTA
                                                Palmbeach Daily 'News',$4,000,73,73,'News',1-2 Weeks,'N','Y',Y,FLORIDA
                                                Phillyburbs,$4,000,70,73,'News',1-2 Weeks,'N','Y',Y,PENNSYLVANIA
                                                St. Augustine Record,$4,000,71,73,'News',1-2 Weeks,'N','Y',Y,FLORIDA
                                                Rockford Register Star,$4,000,71,73,'News',1-2 Weeks,'N','Y',Y,ILLINOIS
                                                The Island Packet,$4,000,77,73,'News',1 Week,'Y',Y,'Y',SOUTH CAROLINA
                                                Fall River Herald 'News',$4,000,63,74,'News',1-2 Weeks,'N','Y',Y,MASSACHUSETTS
                                                Columbia Daily Tribune,$4,000,66,74,'News',1-2 Weeks,'N','Y',Y,MISSOURI
                                                The Augusta Chronicle,$4,000,67,74,'News',1-2 Weeks,'N','Y',Y,GEORGIA
                                                Shreveport Times,$4,000,67,74,'News',1-2 Weeks,'N','Y',Y,LOUISIANA
                                                Herald-Mail Media,$4,000,70,74,'News',1-2 Weeks,'N','Y',Y,MARYLAND
                                                Courier & Press,$4,000,69,74,'News',1-2 Weeks,'N','Y',Y,INDIANA
                                                MetroWest Daily 'News',$4,000,70,74,'News',1-2 Weeks,'N','Y',Y,MASSACHUSETTS
                                                Las Cruces Sun-'News',$4,000,72,74,'News',1-2 Weeks,'N','Y',Y,NEW MEXICO
                                                Kitsap Sun,$4,000,71,74,'News',1-2 Weeks,'N','Y',Y,WASHINGTON STATE
                                                Great Falls Tribune,$4,000,72,74,'News',1-2 Weeks,'N','Y',Y,MONTANA
                                                Journal Star,$4,000,74,74,'News',1-2 Weeks,'N','Y',Y,ILLINOIS
                                                South Coast Today,$4,000,68,75,'News',1-2 Weeks,'N','Y',Y,MASSACHUSETTS
                                                South Jersey Courier Post,$4,000,68,75,'News',1-2 Weeks,'N','Y',Y,NEW JERSEY
                                                The Patriot Ledger,$4,000,67,75,'News',1-2 Weeks,'N','Y',Y,MASSACHUSETTS
                                                Athens Banner-Herald,$4,000,69,75,'News',1-2 Weeks,'N','Y',Y,GEORGIA
                                                Pensacola 'News' Journal,$4,000,73,75,'News',1-2 Weeks,'N','Y',Y,FLORIDA
                                                Times Herald-Record,$4,000,73,75,'News',1-2 Weeks,'N','Y',Y',NEW YORK'
                                                Wilmington Star-'News',$4,000,73,75,'News',1-2 Weeks,'N','Y',Y,NORTH CAROLINA
                                                South Bend Tribune,$4,000,73,75,'News',1-2 Weeks,'N','Y',Y,INDIANA
                                                The State Journal-Register,$4,000,74,75,'News',1-2 Weeks,'N','Y',Y,ILLINOIS
                                                Stamford Advocate ,$4,000,77,75,'News',1-2 Weeks,'Y',Y,'Y',CONNECTICUT
                                                Daytona Beach 'News'-Journal,$4,000,69,76,'News',1-2 Weeks,'N','Y',Y,FLORIDA
                                                The Poughkeepsie Journal,$4,000,70,76,'News',1-2 Weeks,'N','Y',Y',NEW YORK'
                                                Argus Leader,$4,000,68,76,'News',1-2 Weeks,'N','Y',Y,SOUTH DAKOTA
                                                The Register-Guard,$4,000,71,76,'News',1-2 Weeks,'N','Y',Y,OREGON
                                                VC Star,$4,000,73,76,'News',1-2 Weeks,'N','Y',Y,'CALIFORNIA'
                                                Cape Cod Times,$4,000,68,77,'News',1-2 Weeks,'N','Y',Y,MASSACHUSETTS
                                                Sea Coast Online,$4,000,73,77,'News',1-2 Weeks,'N','Y',Y,NEW HAMPSHIRE
                                                Savannah Morning 'News',$4,000,72,77,'News',1-2 Weeks,'N','Y',Y,GEORGIA
                                                Lakeland Ledger,$4,000,73,77,'News',1-2 Weeks,'N','Y',Y,FLORIDA
                                                The Topeka Capital-Journal,$4,000,73,77,'News',1-2 Weeks,'N','Y',Y,KANSAS
                                                Treasure Coast 'News',$4,000,74,77,'News',1-2 Weeks,'N','Y',Y,FLORIDA
                                                CT Post,$4,000,80,78,'News',1-2 Weeks,'Y',Y,'Y',CONNECTICUT
                                                Success.com,$4,000,80,80,'News',3-4 Weeks,'Discreet','Y','N',UNITED STATES
                                                My San Antonio ,$4,000,81,81,'News',1-2 Weeks,'Y',Y,'Y',TEXAS
                                                Seattle Pi,$4,000,82,81,'News',1-2 Weeks,'Y',Y,'Y',SEATTLE
                                                Wisconsin State Journal,$4,000,87,81,'News',1 Week,'N','Y',Y,WISCONSIN
                                                Arizona Daily Star,$4,000,81,81,'News',1 Week,'N','Y',Y,ARIZONA
                                                Times Union,$4,000,81,83,'News',1-2 Weeks,'Y',Y,'Y'',NEW YORK'
                                                Paste Magazine,$4,000,86,83,Entertainment,1-2 Weeks,'N','Y',Y,GEORGIA
                                                E! 'News' / E Online,$4,000,92,86,'News','3-5 Days','Discreet','Y',Y,LOS ANGELES
                                                Chron,$4,000,91,90,'News',1-2 Weeks,'Y',Y,'Y',HOUSTON
                                                SF Gate,$4,000,93,91,'News',1-2 Weeks,'Y',Y,'Y',SAN FRANCISCO
                                                Pocono Record,$4,000,67,72,'News',1-2 Weeks,'N','Y',Y,PENNSYLVANIA
                                                Lansing State Journal,$4,000,70,76,'News',1-2 Weeks,'N','Y',Y,MICHIGAN
                                                Mansfield 'News' Journal,$4,000,64,68,'News',1-2 Weeks,'N','Y',Y,OHIO
                                                Elle Canada,$4,000,68,74,Fashion,2-4 Weeks,'N','Y',Y,CANADA
                                                El Paso Times,$4,000,77,75,'News',1-2 Weeks,'N','Y',Y,TEXAS
                                                Greenville Online,$4,000,77,76,'News',1-2 Weeks,'N','Y',Y,SOUTH CAROLINA
                                                GQ Middle East,$4,000,59,62,Fashion,1-2 Weeks,'N','Y',Y,UAE
                                                Cineserie,$4,000,72,66,Entertainment,1 Week,'N','Y',Y,FRANCE
                                                Forbes Israel,$4,000,51,70,'News',1-2 Weeks,'N','Y',Y,ISRAEL
                                                Grazia Middle East,$4,000,71,74,Fashion,1 Week,'N','Y',Y,MIDDLE EAST
                                                High Times ,$4,000,79,80,CBD,1-2 Weeks,'Discreet','Y','N',UNITED STATES
                                                Investing.com,$4,000,90,88,Business,1-2 Weeks,'N','Y','N',UNITED STATES
                                                Marie Claire Mexico,$4,000,57,41,'News'/Fashion,1-2 Weeks,'N','Y','N',MEXICO
                                                CEO Middle East,$4,000,23,52,'News',1-2 Weeks,'N','Y',Y,UAE
                                                Masala,$4,000,60,55,'News',1-2 Weeks,'N','Y',Y,UAE
                                                Cosmopolitan Middle East,$4,000,57,65,'News',1-2 Weeks,'N','Y',Y,UAE
                                                Watch Pro,$4,000,52,68,'News',1-2 Weeks,'N','Y',Y,UAE
                                                Forbes Australia,$4,000,42,68,'News',2-3 Weeks,'Discreet','Y',Y,AUSTRALIA
                                                The Californian,$4,000,67,69,'News',1-2 Weeks,'N','Y',Y,'CALIFORNIA'
                                                Wausau Daily Herald,$4,000,76,70,'News',1-2 Weeks,'N','Y',Y,WISCONSIN
                                                Glamour Mexico (Pitch),$4,000,77,70,Fashion,1-2 Weeks,'N','Y','N',MEXICO
                                                Esquire Middle East,$4,000,69,71,'News',1-2 Weeks,'N','Y',Y,UAE
                                                Journal & Courier,$4,000,72,72,'News',1-2 Weeks,'N','Y',Y,INDIANA
                                                Record Searchlight,$4,000,68,73,'News',1-2 Weeks,'N','Y',Y,'CALIFORNIA'
                                                Post Crescent,$4,000,76,73,'News',1-2 Weeks,'N','Y',Y,WISCONSIN
                                                Harper's Bazaar Arabia,$4,000,66,74,'News',1-2 Weeks,'N','Y',Y,UAE
                                                Construction Week Online,$4,000,62,74,'News',1-2 Weeks,'N','Y',Y,UAE
                                                York Daily Record,$4,000,79,74,'News',1-2 Weeks,'N','Y',Y,PENNSYLVANIA
                                                Lubbock Avalanche-Journal,$4,000,81,74,'News',1-2 Weeks,'N','Y',Y,TEXAS
                                                Green Bay Press Gazette,$4,000,75,75,'News',1-2 Weeks,'N','Y',Y,WISCONSIN
                                                The Fayetteville Observer,$4,000,76,75,'News',1-2 Weeks,'N','Y',Y,NORTH CAROLINA
                                                My Central Jersey,$4,000,81,75,'News',1-2 Weeks,'N','Y',Y,NEW JERSEY
                                                The Coloradoan,$4,000,75,76,'News',1-2 Weeks,'N','Y',Y,COLORADO
                                                Montgomery Advertiser,$4,000,76,76,'News',1-2 Weeks,'N','Y',Y,ALABAMA
                                                Burlington Free Press,$4,000,75,76,'News',1-2 Weeks,'N','Y',Y,VERMONT
                                                The Gainesville Sun,$4,000,76,76,'News',1-2 Weeks,'N','Y',Y,FLORIDA
                                                GoErie,$4,000,77,76,'News',1-2 Weeks,'N','Y',Y,PENNSYLVANIA
                                                Statesman Journal,$4,000,78,76,'News',1-2 Weeks,'N','Y',Y,OREGON
                                                The Citizen-Times,$4,000,77,77,'News',1-2 Weeks,'N','Y',Y,NORTH CAROLINA
                                                Tallahassee Democrat,$4,000,77,78,'News',1-2 Weeks,'N','Y',Y,FLORIDA
                                                Florida Today,$4,000,77,78,'News',1-2 Weeks,'N','Y',Y,FLORIDA
                                                Reno Gazette-Journal,$4,000,78,78,'News',1-2 Weeks,'N','Y',Y,NEVADA
                                                Naples Daily 'News',$4,000,79,78,'News',1-2 Weeks,'N','Y',Y,FLORIDA
                                                The 'News'-Press,$4,000,78,78,'News',1-2 Weeks,'N','Y',Y,FLORIDA
                                                Commercial Appeal,$4,000,78,78,'News',1-2 Weeks,'N','Y',Y,TENNESSEE
                                                The Clarion-Ledger,$4,000,79,78,'News',1-2 Weeks,'N','Y',Y,MISSISSIPPI
                                                Democrat & Chronicle,$4,000,78,79,'News',1-2 Weeks,'N','Y',Y',NEW YORK'
                                                The Desert Sun,$4,000,76,79,'News',1-2 Weeks,'N','Y',Y,'CALIFORNIA'
                                                Delaware Online,$4,000,78,79,'News',1-2 Weeks,'N','Y',Y,DELAWARE
                                                The Journal 'News',$4,000,80,79,'News',1-2 Weeks,'N','Y',Y',NEW YORK'
                                                Knox 'News',$4,000,84,79,'News',1-2 Weeks,'N','Y',Y,TENNESSEE
                                                Marie Claire Argentina (Pitch),$4,000,88,79,LifeStyle,1-2 Weeks,'N','Y','N',ARGENTINA
                                                The Providence Journal,$4,000,78,80,'News',1-2 Weeks,'N','Y',Y,RHODE ISLAND
                                                Asbury Park Press,$4,000,81,80,'News',1-2 Weeks,'N','Y',Y,NEW JERSEY
                                                Florida Times-Union,$4,000,79,80,'News',1-2 Weeks,'N','Y',Y,FLORIDA
                                                Sarasota Herald-Tribune,$4,000,79,80,'News',1-2 Weeks,'N','Y',Y,FLORIDA
                                                Louisville 'News',$4,000,81,81,'News',1-2 Weeks,'N','Y',Y,KENTUCKY
                                                The Oklahoman,$4,000,82,81,'News',1-2 Weeks,'N','Y',Y,OKLAHOMA
                                                Palm Beach Post,$4,000,84,81,'News',1-2 Weeks,'N','Y',Y,FLORIDA
                                                North Jersey 'News',$4,000,78,82,'News',1-2 Weeks,'N','Y',Y,NEW JERSEY
                                                The Des Monies Register,$4,000,82,82,'News',1-2 Weeks,'N','Y',Y,IOWA
                                                Cincinnati 'News',$4,000,84,82,'News',1-2 Weeks,'N','Y',Y,OHIO
                                                The Columbus Dispatch,$4,000,79,83,'News',1-2 Weeks,'N','Y',Y,OHIO
                                                Indianapolis Star,$4,000,83,83,'News',1-2 Weeks,'N','Y',Y,INDIANA
                                                Austin American-Statesman,$4,000,87,83,'News',1-2 Weeks,'N','Y',Y,TEXAS
                                                The Tennessean,$4,000,83,84,'News',1-2 Weeks,'N','Y',Y,TENNESSEE
                                                Milwaukee Journal Sentinel,$4,000,89,85,'News',1-2 Weeks,'N','Y',Y,WISCONSIN
                                                Worcester Telegram,$4,000,81,86,'News',1-2 Weeks,'N','Y',Y,MASSACHUSETTS
                                                Detroit Free Press,$4,000,91,86,'News',1-2 Weeks,'N','Y',Y,MICHIGAN
                                                Tampa Bay Times,$4,000,85,86,'News',1 Week,'Y',Y,'N',FLORIDA
                                                Arizona Central,$4,000,90,87,'News',1-2 Weeks,'N','Y',Y,ARIZONA
                                                Bitcoin.com (Press Release),$4,000,88,88,Crypto,'3 Days','Discreet','Y','N','GLOBAL'
                                                IGN (Nordic),$4,000,92,88,Technology ,'3-5 Days','Discreet','Y','N',NORDIC
                                                Nasdaq,$4,000,90,90,Business / Tech,1-2 Weeks,'N','Y',Y,UNITED STATES
                                                The Independent,$4,000,94,91,'News',1-2 Week,'Discreet','Y','N',UNITED KINGDOM
                                                Glaumour Mexico (Pitch),$4,000,76,70,'News'/Fashion,1-2 Weeks,'N','Y','N',MEXICO
                                                CantonRep,$4,000,80,75,'News',1-2 Weeks,'N','Y',Y,OHIO
                                                Akron Beacon Journal,$4,000,80,77,'News',1-2 Weeks,'N','Y',Y,OHIO
                                                Elite Daily,$4,000,89,84,Lifestyle,1 Week,'N','Y','N',UNITED STATES
                                                Romper,$4,000,77,79,Lifestyle,1 Week,'N','Y','N',UNITED STATES
                                                The Dad,$4,000,50,49,Lifestyle,1 Week,'N','Y','N',UNITED STATES
                                                Bustle,$4,000,92,89,Lifestyle,1 Week,'N','Y','N',UNITED STATES
                                                Wicked Local,$4,000,81,81,'News',1-2 Weeks,'N','Y',Y,MASSACHUSETTS
                                                The Zoe Report,$4,000,77,80,Fashion,1 Week,'N','Y','N',UNITED STATES
                                                Fatherly,$4,000,80,79,'News',1 Week,'N','Y','N',UNITED STATES
                                                Nylon,$4,000,77,80,'News',1 Week,'N','Y','N',UNITED STATES
                                                Inverse,$4,000,83,83,'News',1 Week,'N','Y','N',UNITED STATES
                                                Mic,$4,000,84,83,'News',1 Week,'N','Y','N',UNITED STATES
                                                Scary Mommy,$4,000,80,79,Lifestyle,1 Week,'N','Y','N',UNITED STATES
                                                Galore Magazine + IG Post,$4,150,78,66,Lifestyle,'1-'3 Days'','N','Y',Y,UNITED STATES
                                                Muscle & Fitness (Includes Social Post),$4,150,85,78,Lifestyle,1-4 Weeks,'N','Y',Y,UNITED STATES
                                                Mens Journal,$4,150,85,85,Lifestyle,1 Week,'Discreet','Y',Y,UNITED STATES
                                                NDTV,$4,150,92,90,'News',1-2 Weeks,'Discreet','Y','N',UNITED STATES
                                                Organic Coverage (NY Post / The Sun / The Mirror / Daily Star / Daily Mirror / The Express / Daily Mail),$4,250,94,86,'News',3-4 Weeks,'N','Y','N',UNITED KINGDOM
                                                Saudia Gazette,$4,250,77,76,'News',1 Week,'Discreet','Y','N',UAE
                                                Hollywood Life + IG Post,$4,250,90,80,Entertainment,5 Days,'N','Y',M,'CALIFORNIA'
                                                Geekwire,$4,250,87,86,Tech,'3-5 Days','Discreet','Y','N','GLOBAL'
                                                Inman.com (Contributor),$4,250,76,83,Real Estate,2-3 Weeks,'N','Y','N',UNITED STATES
                                                Entrepreneur (Asia Pacific),$4,250,92,91,'News','1-'3 Days'','N','Y','N',ASIA PACIFIC
                                                Arabian Business ,$4,300,85,80,'News',1-2 Weeks,'N','Y',Y,UAE
                                                USA Today,$4,300,94,92,'News',1-2 Weeks,'N','Y',Y,'GLOBAL'
                                                Maxim Full Feature ,$4,300,86,78,'News'/Fashion,1-3 Weeks,'Discreet','Y',Y',NEW YORK'
                                                Consequence.net (Staff),$4,300,81,79,Music,1 Week,'N','Y','N'',NEW YORK'
                                                Bitcoin.com (Sponsored),$4,300,88,88,Crypto,'3 Days','Y',Y,'N','GLOBAL'
                                                Rolling Stone (Africa),$4,300,92,90,Entertainment,1-2 Weeks,'N','Y',Y,AFRICA
                                                Caller Times,$5,500,77,73,'News',2-3 Weeks,'N','Y','N','GLOBAL'
                                                GamesBeat,$6,000,92,91,Gaming,1-2 Weeks,'N','Y',Y,UNITED STATES
                                                USA Today (50,000 Impressions),$6,000,94,92,'News',2-4 Weeks,'N','Y',Y,UNITED STATES
                                                OK Magazine + Social Post,$6,000,81,75,Entertainment,'3-5 Days','N','Y',Y,'GLOBAL'
                                                Radar Magazine + Social Post,$6,000,81,79,Entertainment,'3-5 Days','N','Y',Y,'GLOBAL'
                                                The Hill,$6,000,92,90,'News',1-2 Weeks,'Y',Y,'N',WASHINGTON DC
                                                Venture Beat,$6,000,92,91,Tech,1 Week,'N','Y',Y,'GLOBAL'
                                                Ok.co.uk,$7,000,80,74,'News',2-3 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                Sourcing Journal,$7,000,74,78,'News',1-2 Weeks,'N','Y',Y,'GLOBAL'
                                                Foot Wear 'News',$7,000,84,80,Fashion,1-2 Weeks,'N','Y',Y,'GLOBAL'
                                                DailyStar (Guaranteed),$7,000,92,82,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                WWD,$7,000,87,87,Fashion,1-2 Weeks,'N','Y','N',UNITED STATES
                                                Express (Guaranteed),$7,000,93,89,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                Mirror (Guaranteed),$7,000,94,90,'News',1-2 Weeks,'Y',Y,'N',UNITED KINGDOM
                                                Inc Magazine (Mention),$7,000,92,92,Business,1 Month,'N','Y',Y,UNITED STATES
                                                LA Times,$7,500,93,92,'News',1 Week,'Y',Y,'N',LOS ANGELES
                                                USA Today (100,000 Impressions),$8,000,94,92,'News',2-4 Weeks,'N','Y',Y,UNITED STATES
                                                The Real Deal,$8,000,81,83,Real Estate,1-2 Weeks,'Discreet','Y','N',UNITED STATES
                                                Vogue (Ukraine),$8,500,61,71,Fashion,1 Week,'N','Y',Y,UKRAINE
                                                The Hollywood Repoter,$8,750,93,90,'News',1-2 Weeks,'Y',Y,'N',LOS ANGELES
                                                Entrepreneur Middle East (Includes Print),$8,750,92,91,'News',1 Week,'N','Y',Y,UAE
                                                USA Today (250,000 Impressions),$10,500,94,92,'News',2-4 Weeks,'N','Y',Y,UNITED STATES
                                                Telemundo,$10,500,84,77,'News',1-2 Weeks,'Y',Y,'Y',UNITED STATES
                                                Today.com,$10,500,92,90,'News',1-2 Weeks,'Y',Y,'Y',UNITED STATES
                                                NBC,$10,500,93,91,'News',1-2 Weeks,'Y',Y,'Y',UNITED STATES
                                                CNBC,$10,500,93,92,'News',1-2 Weeks,'Y',Y,'Y',UNITED STATES
                                                Stylecaster ,$10,500,77,81,'News'/Fashion,1-2 Weeks,'Discreet','Y','N','GLOBAL'
                                                She knows ,$10,500,87,83,LifeStyle,1-2 Weeks,'Discreet','Y','N','GLOBAL'
                                                US Weekly,$10,500,91,84,Lifestyle ,1 Week,'Discreet','Y',Y,'GLOBAL'
                                                Coindesk,$17,500,91,90,Tech,1-2 Weeks,'Y',Y,'N'',NEW YORK'
                                                Variety + (400,000 Guranateed Impressions),$17,500,93,91,Lifestyle ,1-2 Weeks,'N','Y','N','GLOBAL'
                                                Rolling Stone + (400,000 Guranateed Impressions),$21,900,92,90,Music,1-2 Weeks,'Discreet','Y','N',UNITED STATES
                                                Billboard.com,$43,700,92,90,Entertainment,1-2 Weeks,'Discreet','Y','N','GLOBAL'
                                                Tech Crunch (Includes Social Post),$52,500,93,92,Lifestyle,2-3 Weeks,'Y',Y,'N','GLOBAL'
                                                Bloomberg,$155,000,94,92,'News',1 Month,'Y',Y,'Y',UNITED STATES
