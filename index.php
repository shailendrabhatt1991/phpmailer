<div class="col m6 half write-us">
            <div>
              <h5 class="header left-align light">write us<br>..........</h5>
              <form action="mail_handler.php" method="POST">
              <div class="row">                
                <div class="col m6 input-field">
                  <input type="text" name="username" id="username" required>
                  <label for="Name">Name *</label>
                </div>
                <div class="col m6 input-field">                
                  <input type="text" name="surname" id="surname" required>
                  <label for="Surname">Surname *</label>
                </div>
              </div>            
              <div class="row">    
                <div class="col m6 input-field">                  
                  <input type="text" name="city" id="city" required>
                  <label for="City">City *</label>
                </div>
                <div class="col m6 input-field">                
                  <input type="text" name="country" id="country" required>
                  <label for="Country">Country *</label>
                </div>
              </div>
              <div class="row">                
                <div class="col m6 input-field">
                  <input type="text" name="email" id="email" required>
                  <label for="Email">Email *</label>
                </div>
                <div class="col m6 input-field">                
                  <input type="text" name="phone" id="phone">
                  <label for="Phone">Phone</label>
                </div>
              </div>
              <div class="row">  
                <div class="col s12 input-field">   
                  <textarea name="Message" style="line-height: normal;" id="Message" class="materialize-textarea" required=""></textarea>
                  <label for="Message" class="">Message *</label>
                </div>
                <div class="col s12 left-align p-none">   
                  <input type="submit" name="submit" value="send" class="waves-effect waves-light btn send-btn">
                </div>
              </div>
              </form>
            </div>  
          </div> 