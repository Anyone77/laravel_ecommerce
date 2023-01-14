

   <body>
      <div class="hero_area">
         <!-- header section strats -->
            @include('home.header')
         <!-- end header section -->

      <!-- product section -->
            @include('home.view_product')
      <!-- end product section -->

      <!-- comment system start here  -->

            <div style="text-align: center; padding-bottom: 30px;">
               <h1 style="font-size: 30px; text-align: center; padding-top: 20px;
               padding-bottom:20px;">Comments</h1>

               <form action="{{url('add_comment')}}" method="POST">
                  @csrf
                  <textarea style="height:150px; width:600px;" name="comment" placeholder="comment here"></textarea>
                  <br>
                  <input type="submit" value="Comment" class="btn btn-primary">
               </form>

            </div>

            <div class="container mt-5" style="padding-bottom: 50px;">

        <div class="row  d-flex justify-content-center">

            <div class="col-md-8">

                <div class="headings d-flex justify-content-between align-items-center mb-3">
                    <h5>Unread comments(6)</h5>

                    <div class="buttons">

                        
                        
                    </div>
                    
                </div>





               @foreach($comment as $com)
               <div class="card p-3 mt-2">

                    <div class="d-flex justify-content-between align-items-center">

                  <div class="user d-flex flex-row align-items-center">

                    <img src="https://i.imgur.com/C4egmYM.jpg" width="30" class="user-img rounded-circle mr-2">
                    <span><small class="font-weight-bold text-primary" style="font-size: large; margin-right:10px;">{{$com->name}}</small><small>{{$com->comment}}</small></span>
                   
                  </div>


                  <small>{{$com->created_at}}</small>

                  </div>


                  <div class="action d-flex justify-content-between mt-2 align-items-center">

                    
                        
                        
                    <button  class="reply-button  " style="color:blue; border:none; background:none;">Reply</button>
                        <div class="row flex-row d-flex">
                           <form action="{{url('add_reply')}}" method="post">
                              @csrf
                                 <div class="col-lg-12">
                                    <input type="text" id="commentId" name="commentId" value="{{$com->id}}" hidden="">
                                       <textarea id="reply-form" style="display:none" name="reply" cols="80" rows="2" class="reply form-control mb-10" name="replyMessage"></textarea>
                                       <input type="submit" value="Reply"  id="reply-form" class="reply btn btn-primary">
                                    </div>
                                 
                           </form>
                        </div>


                        
                       
                  
                     

                      
                  </div>


                    
               </div>


              @foreach($reply as $res)

              @if($res->comment_id == $com->id)
               <div class="card p-3 mt-2" style="margin-left: 10%; background-color:silver;">

                    <div class="d-flex justify-content-between align-items-center">

                  <div class="user d-flex flex-row align-items-center">

                    <img src="https://i.imgur.com/C4egmYM.jpg" width="30" class="user-img rounded-circle mr-2">
                    <span><small class="font-weight-bold text-primary" style="font-size: large; margin-right:10px;">{{$res->name}}</small><small>{{$res->reply}}</small></span>
                   
                  </div>


                  <small>{{$res->created_at}}</small>

                  </div>


                  <div class="action d-flex justify-content-between mt-2 align-items-center">

                    
                        
                        
                    <button  class="reply-button  " style="color:blue; border:none; background:none;">Reply</button>
                        <div class="row flex-row d-flex">
                           <form action="{{url('add_reply')}}" method="post">
                              @csrf
                                 <div class="col-lg-12">
                                    <input type="text" id="commentId" name="commentId" value="{{$com->id}}" hidden="">
                                       <textarea id="reply-form" style="display:none" name="reply" cols="80" rows="2" class="reply form-control mb-10" name="replyMessage"></textarea>
                                       <input type="submit" value="Reply"  id="reply-form" class="reply btn btn-primary">
                                    </div>
                                 
                           </form>
                        </div>


                        
                       
                  
                     

                      
                  </div>


                    
               </div>

               @endif

               @endforeach

               
               

               @endforeach









                
            </div>
            
        </div>
        
    </div>

            
           


      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>

<script type="text/javascript">

document.querySelectorAll(".reply-button").forEach(btn=>btn.onclick=ev=>{      
  const x=ev.target.nextElementSibling.querySelector(".reply");
  x.style.display = x.style.display ==="none"?"":"none";
});
</script>

<script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
