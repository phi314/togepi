<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/15/16
 * Time: 9:16 PM
 */

?>

<div class="row">
    <div class="col-md-12 warning">
        <div id="jadwal-pekerjaan"></div>
    </div>
</div>

<!-- Modal Input BCPW -->
<div class="modal fade" id="edit-bcwp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

    </div>
</div>

<script src="../js/moment.min.js"></script>
<script src="../js/fullcalendar/lang/id.js"></script>
<script src="../js/fullcalendar/fullcalendar.min.js"></script>
<script type="text/javascript">
    if($("#jadwal-pekerjaan").length > 0){

        function prepare_external_list(){

            $('#external-events .external-event').each(function() {
                var eventObject = {title: $.trim($(this).text())};

                $(this).data('eventObject', eventObject);
                $(this).draggable({
                    zIndex: 999,
                    revert: true,
                    revertDuration: 0
                });
            });

        }


        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        prepare_external_list();

        var calendar = $('#jadwal-pekerjaan').fullCalendar({
            lang: 'id',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: false,
            eventSources: {url: "../komponen/kalender_pekerjaan_json.php?id_proyek=<?php echo $d->id; ?>"},
            droppable: false,
            selectable: true,
            selectHelper: true,
            eventClick: function(calEvent, jsEvent, view){

                var id = calEvent.id_proyek_pekerjaan;
                var id_proyek = calEvent.id_proyek;
                var is_developer = calEvent.is_developer;

                if(is_developer == true){
                    $('#edit-bcwp').modal('show');

                    $.ajax({
                        url: base_url + 'komponen/modal/edit_bcwp.php',
                        type: 'get',
                        data: {
                            id: id,
                            id_proyek: id_proyek
                        },
                        success: function(modal){
                            $('#edit-bcwp .modal-dialog').html(modal);
                        }
                    });
                }
                else {
                    alert(calEvent.messages);
                }
            },
            eventRender: function(event, element){
                element.find('.fc-title').prop('title', event.title);
            }
        });
    }

</script>
