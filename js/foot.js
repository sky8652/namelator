window.onload=function(){
    mange();
  }
  
  function mange(){
    var a=['1399694975@qq.com','wangshimeng@gmail.com'];
    var email=localStorage.getItem('email');
    if(email){
       var index=a.indexOf(email);
       if(index != -1){
        //  var btn=document.getElementsByTagName('header').
         var a=document.getElementsByClassName('nav')[0].getElementsByClassName('rel')[0];
         console.log(a);
        
            var btn = document.createElement("button");
            btn.style.marginRight = '30px';
            btn.innerHTML='管理后台';
            a.insertBefore(btn,a.childNodes[0]);
            btn.onclick=function(){
              window.location.href="giveName.html";
            }
        
         
       }
    }
  }
Vue.component('foot',{
    template:`
    <div class="foot rel">
                            <img src="img/footbg.png" class="char_img" alt="">
                            <div class="w1200 row center">
                                <div class="foot_left">
                                    <div class="notice_title">Copyright Notice</div>
                                    <div class="notice">If the image and content of the website involve copyright infringement, please notify us in time and present proof of identity, copyright certificate and proof of infringement. We will take immediate steps to resolve it.</div>
                                    <div class="tip">
                                           Company Address: Room 712, No. 213, Mingkang Road, Minzhi Street,
                                              Longhua District, Shenzhen, Guangdong, China
                                       </div>
                                </div>
                                <div class="foot_right">
                                    <div class="notice_title">Contact</div>
                                    <div class="notice">
                                        <a href="mailto:1169063533@qq.com">
                                        <img src="img/fot_btn_emal.png" alt="" style="margin-right:50px;"></a>
                                        <img src="img/fot_btn_twter.png" alt="">
                                    </div>
                                    <div class="tip">© 2019 Necta Chanslator. All rights reserved.</div>
                                </div>
                            </div>
                       </div>

    `
})
Vue.component('back',{
    template:`
    <div class="w1200 back" @click="window.history.back();">Back</div>

    `
})

Vue.component('top',{
    template:`
    <div class="nav w1200 row between">
           <div class="logo" @click="window.location.href='getName.html'">
               <img src="img/Namelator@2x.png" alt="">
           </div>
           <div class="row rel">
               <div class="home"><a href="index.html" class="active home">Home</a></div>
               <div v-if="!email" id="customBtn" style="color:#9E7E66;cursor: pointer;">login</div>
               <div class="email" v-if="email">{{email}}</div>
               <div class="pullDown">
                   <div @click="window.location.href='order.html'">My Chinese Name</div>
                   <div @click="signOut()">Log Out</div>
               </div>
           </div>
       </div>

    `,
    props:['email'],
})


Vue.component('alert',{
    template:`<div class="alert" v-if="msgshow">
    <div class="alert_title">PROMPT</div>
    <div class="alert_txt">{{msg}}</div>
 </div>`,
        props:['msgshow','msg'],
        data:{
            "msg":""
        },
        watch:{
            msgshow(){
                if(this.msgshow == true){
                    setTimeout(function(){
                        vm.msgShow=false;
                    },3000)
                }
            }
        }
}
)