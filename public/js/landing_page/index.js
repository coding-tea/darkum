const div = document.querySelectorAll(".filter-href");

div.forEach(function(div){
  div.addEventListener("mouseover", function(e){
    div.firstElementChild.firstElementChild.setAttribute("style", "border : 2px solid #FFF")
  });
  div.addEventListener("mouseout", function(){
    div.firstElementChild.firstElementChild.setAttribute("style", "")
  });
});
