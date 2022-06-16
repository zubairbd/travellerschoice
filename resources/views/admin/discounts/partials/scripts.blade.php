<script>
    
//   $('.datepicker').datepicker({
//     format: 'dd/mm/yyyy',
//     startDate: '-3d',
//     autoclose: true
// })

  //jQuery Datepicker adding days
//   $(document).ready(function() {
//     $("#effective_date").datepicker({
//         changeMonth: true,
//         showOtherMonths: true,
//         selectOtherMonths: true,
//         format: "dd/mm/yyyy",
//         autoclose: true,
//         onSelect: function(selectedDate) {
//             //$("#cal4").datepicker("setDate", selectedDate);
//             var date = $(this).datepicker("getDate");
//             date.setDate(date.getDate() + 90);
//             $("#termination_date").datepicker("setDate", date);
//             $("#termination_date").datepicker( "option", "minDate", selectedDate );
//         }
//     });
//     $("#termination_date").datepicker({
//         showOtherMonths: true,
//         selectOtherMonths: true,
//         format: "dd/mm/yyyy",
//         autoclose: true,
//         onSelect: function(selectedDate) {
//             $("#effective_date").datepicker( "option", "maxDate", selectedDate );
//         }
//     });
//   });

  // Alert Close
 

//   $(function() {
//     $( "#effective_date" ).datepicker({ 
//       format: "dd/mm/yy",
//       autoclose: true,
//       onSelect: function(selectedDate) {
//           //$("#cal4").datepicker("setDate", selectedDate);
//           var date = $(this).datepicker("getDate");
//           date.setDate(date.getDate() + 90);
//           $("#termination_date").datepicker("setDate", date);
//           $("#termination_date").datepicker( "option", "minDate", selectedDate );
//       }
//     });
//     $("#effective_date").on("change",function(){
//         var selected = $(this).val();
//         $('#termination_date').val(selected);
//     });
// });
$(document).ready(function() {
    $("#effective_date").datepicker({
        changeMonth: true,
        showOtherMonths: true,
        selectOtherMonths: true,
        format: "dd/mm/yyyy",
        autoclose: true,
        onSelect: function(selectedDate) {
            //$("#cal4").datepicker("setDate", selectedDate);
            var date = $(this).datepicker("getDate");
            date.setDate(date.getDate() + 30);
            $("#termination_date").datepicker("setDate", date);
            $("#termination_date").datepicker( "option", "minDate", selectedDate );
        }
    });
    $("#termination_date").datepicker({
      
        showOtherMonths: true,
        selectOtherMonths: true,
        format: "dd/mm/yyyy",
        autoclose: true,
        onSelect: function(selectedDate) {
            $("#effective_date").datepicker( "option", "maxDate", selectedDate );
        }
    });
  });

</script>