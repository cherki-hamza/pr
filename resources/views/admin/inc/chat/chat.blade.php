<style>
    .chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 40px;
    padding-bottom: 5px;
    /* border-bottom: 1px dotted #B3A9A9; */
    margin-top: 10px;
    width: 80%;
}


.chat li .chat-body p
{
    margin: 0;
    /* color: #777777; */
}


.chat-care
{
    overflow-y: scroll;
    height: 350px;
}
.chat-care .chat-img
{
    width: 50px;
    height: 50px;
}
.chat-care .img-circle
{
    border-radius: 50%;
}
.chat-care .chat-img
{
    display: inline-block;
}
.chat-care .chat-body
{
    display: inline-block;
    max-width: 80%;
    background-color: #FFC195;
    border-radius: 12.5px;
    padding: 15px;
}
.chat-care .chat-body strong
{
  color: #0169DA;
}

.chat-care .admin
{
    text-align: right ;
    float: right;
}
.chat-care .admin p
{
    text-align: left ;
}
.chat-care .agent
{
    text-align: left ;
    float: left;
}
.chat-care .left
{
    float: left;
}
.chat-care .right
{
    float: right;
}

.clearfix {
  clear: both;
}




::-webkit-scrollbar-track
{
    box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}
</style>
<div style="position:absolute;z-index: 1;float: right;" class="container">
    <div class="row">
          <div class="col-md-6 mx-auto">
              <div class="card">
                  <div class="card-header text-center">
                      <span>Chat Box</span>
                  </div>
                  <div class="card-body pr_chat chat-care">
                      <ul class="chat">
                          <li class="agent clearfix">
                              <span class="chat-img left clearfix mx-2">
                                  <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="Agent" class="img-circle" />
                              </span>
                              <div class="chat-body clearfix">
                                  <div class="header clearfix">
                                      <strong class="primary-font">Jack Sparrow</strong> <small class="right text-muted">
                                          <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                  </div>
                                  <p>
                                      Lorem ipsum dolor sit amet.
                                  </p>
                              </div>
                          </li>
                          <li class="admin clearfix">
                              <span class="chat-img right clearfix  mx-2">
                                  <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="Admin" class="img-circle" />
                              </span>
                              <div class="chat-body clearfix">
                                  <div class="header clearfix">
                                      <small class="left text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                      <strong class="right primary-font">Bhaumik Patel</strong>
                                  </div>
                                  <p>
                                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                      dolor, quis ullamcorper ligula sodales.
                                  </p>
                              </div>
                          </li>
                          <li class="agent clearfix">
                              <span class="chat-img left clearfix mx-2">
                                  <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="Agent" class="img-circle" />
                              </span>
                              <div class="chat-body clearfix">
                                  <div class="header clearfix">
                                      <strong class="primary-font">Jack Sparrow</strong> <small class="right text-muted">
                                          <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                  </div>
                                  <p>
                                      Lorem ipsum dolor sit amet.
                                  </p>
                              </div>
                          </li>
                          <li class="admin clearfix">
                              <span class="chat-img right clearfix  mx-2">
                                  <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="Admin" class="img-circle" />
                              </span>
                              <div class="chat-body clearfix">
                                  <div class="header clearfix">
                                      <small class="left text-muted"><span class="glyphicon glyphicon-time"></span>15 mins ago</small>
                                      <strong class="right primary-font">Bhaumik Patel</strong>
                                  </div>
                                  <p>
                                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                      dolor.
                                  </p>
                              </div>
                          </li>
                      </ul>
                  </div>
                  <div class="card-footer">
                      <div class="input-group">
                          <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                          <span class="input-group-btn">
                              <button class="btn btn-primary" id="btn-chat">
                                  Send</button>
                          </span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
