<!DOCTYPE html>
<html>
<link rel="stylesheet" href="/css/main.css">
<body>
    <h1>Uzdevuma atjaunināšana</h1>
    <form method="POST" action="{{ route('todo.update', ['id' => $todo->id]) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $todo->id }}">
        <input type="text" name="task_name" id="task_name" value="{{ $todo->task_name }}">
        <label for="task_name">Uzdevuma nosaukums: </label>
        <br>
        <input type="text" name="end_date" id="end_date" value="{{ $todo->end_date }}">
        <label for="end_date">Beigu datums: </label>
        <br>
        <input type="text" name="description" id="description" value="{{ $todo->description }}">
        <label for="description">Apraksts: </label>
        <br>
        <input type="checkbox" id="finished "name="finished">
        <label for="finished">Vai ir pabeigts?</label>
        <br>
        <input type="submit" value="Atjaunot" onclick="validateForm(event)">
    </form>
    <p><input type="button" value="Atpakaļ" onclick="back()"></p>
</body>

<script>
 function back() {
 window.location.href = "/todo";
 }

 function validateForm(event) {
   var taskName = document.getElementById('task_name').value.trim();
   var endDate = document.getElementById('end_date').value.trim();
   var dateParts = endDate.split('-');
   var year = parseInt(dateParts[0], 10);
   var month = parseInt(dateParts[1], 10);
   var day = parseInt(dateParts[2], 10);

   if (taskName === '' || endDate === '') {
     event.preventDefault();
     alert('Lūdzu, aizpildiet visus laukus.');
    } else if (taskName.length <= 15) {
    event.preventDefault();
    alert('Uzdevuma nosaukumam jābūt garākam par 15 simboliem.');
    }else if (isNaN(year) || isNaN(month) || isNaN(day)) {
     event.preventDefault();
     alert('Ievadītā datuma formāts nav derīgs.');
   } else if (month > 12 || month < 1 || day > 31 || day < 1) {
     event.preventDefault();
     alert('Nepareiza mēneša vai dienas vērtība.');
   }
 }
 </script>


</html>