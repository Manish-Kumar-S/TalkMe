const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = document.getElementById("send"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();
}

// sendBtn.onclick = ()=>{
//     alert("clicked");
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "insert-chat.php", true);
//     xhr.onload = ()=>{
//         if(xhr.readyState === XMLHttpRequest.DONE){
//             if(xhr.status === 200){
//                 inputField.value = "";
//             }
//         }
//     }
//     let formData = new FormData(form);
//     xhr.send(formData);
// }

 $("#send").click(function(){
     var outgoing_id =$(".out").val();
     var incoming_id= $(".in").val();
     var message=inputField.value;
     $.post("insert-chat.php",{incoming_id:incoming_id,outgoing_id:outgoing_id,message:message},function(d){
        
         inputField.value = "";
         scrollToBottom();
     });
 });

 chatBox.onmouseenter = ()=>{
    document.querySelector(".chat-box").classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}


setInterval(function(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "get-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){
                    scrollToBottom();
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
},500);

function scrollToBottom(){
    document.querySelector(".chat-box").scrollTop = document.querySelector(".chat-box").scrollHeight;
}