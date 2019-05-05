@extends('layouts.admin')
@section('content')
   <form method="post" action="/exams/store">
        {{ csrf_field() }}
        <h2 style="text-align: center">Examinations</h2>
        <hr>
        <div class="form-group">
            <label for="title">Exam title</label>
            <input id="exam_title" type="text" onblur="restrictDuplicate()" name="exam_title" class="form-control" placeholder="BCT Year3 Semester2" pattern="[A-Z]+\s[A-Za-z0-9]+\s[A-Za-z0-9]+" title="BCT Year3 Semester2">
        </div>      
        <div class="form-group">
            <label for="units_taken">Units taken</label>
            <input id="units_taken" type="text" name="units_taken" class="form-control" placeholder="eg. 7">
        </div> 
        <div style="text-align: center">
         <a href="/exams" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-success btn-lg">Proceed to add units <i class="fa fa-arrow-circle-right"></i></button>   	
        </div>

        </form>
        <br>

        <script type="text/javascript">
          

            function inputDisplay(str){
                if (str.length == 0){
                    alert("Please fill in registration number");
                }else{
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function(){
                        if(this.readyState == 4 && this.status == 200){
                            document.getElementById('student_name').value = this.responseText;
                        }
                    ;}
                    xmlhttp.open("GET", "getStudent/" + str, true);
                    xmlhttp.send();
                }
            }
            function restrictDuplicate(){
                var str = document.getElementById('exam_title').value;
                if (str.length == 0){
                    alert("Please fill in exam title");
                    document.getElementById("submit").addEventListener("click", function(event){event.preventDefault()
                                });
                }else{
                    res = str.split(' ');
                    res2 = res.join('-');
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function(){
                        if(this.readyState == 4 && this.status == 200){
                            if(this.responseText != ""){
                                alert(this.responseText);
                                document.getElementById("submit").addEventListener("click", function(event){event.preventDefault()
                                });

                            }
                            
                        }
                    ;}
                    xmlhttp.open("GET", '/exam/restrictDuplicate?q=' +res2, true);
                    xmlhttp.send();
                }
            }
        </script>
@endsection