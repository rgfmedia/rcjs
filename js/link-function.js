(function($) {
  'use strict';

    let searchParams = new URLSearchParams(window.location.search);

    $('#deliveryModalEdit').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var key = button.data('namekey') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + key;
          var date = searchParams.get('date');
            $.ajax({
                type: "GET",
                url: "delivery_edit.php?date="+date,
                data: dataString,
                cache: false,
                success: function (data) {

                    modal.find('.content-here').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    });
    $('#delete').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var key = button.data('namekey') // Extract info from data-* attributes
          var modal = $(this);
          var url = window.location.href;
          var dataString = {'key': key, 'url': url};
          var date = searchParams.get('date');
            $.ajax({
                type: "GET",
                url: "delete.php?date="+date,
                data: dataString,
                cache: false,
                success: function (data) {
                    modal.find('.content-here').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    });
    $('#expensesModalEdit').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var key = button.data('namekey') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + key;
          var date = searchParams.get('date');
            $.ajax({
                type: "GET",
                url: "expenses_edit.php?date="+date,
                data: dataString,
                cache: false,
                success: function (data) {

                    modal.find('.content-here').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    });
    $('#sumadaModalEdit').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var key = button.data('namekey') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + key;
          var date = searchParams.get('date');
            $.ajax({
                type: "GET",
                url: "sumada_edit.php?date="+date,
                data: dataString,
                cache: false,
                success: function (data) {

                    modal.find('.content-here').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    });
    $('#kapitalModalEdit').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var key = button.data('namekey') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + key;
          var date = searchParams.get('date');
            $.ajax({
                type: "GET",
                url: "kapital_edit.php?date="+date,
                data: dataString,
                cache: false,
                success: function (data) {

                    modal.find('.content-here').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    });
    $('#kumpradaModalEdit').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var key = button.data('namekey') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + key;
          var date = searchParams.get('date');
            $.ajax({
                type: "GET",
                url: "kumprada_edit.php?date="+date,
                data: dataString,
                cache: false,
                success: function (data) {

                    modal.find('.content-here').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    });
    $('#collectionsModalEdit').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var key = button.data('namekey') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + key;
          var date = searchParams.get('date');
            $.ajax({
                type: "GET",
                url: "collections_edit.php?date="+date,
                data: dataString,
                cache: false,
                success: function (data) {

                    modal.find('.content-here').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    });
    $('#baliModalEdit').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var key = button.data('namekey') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + key;
          var date = searchParams.get('date');
            $.ajax({
                type: "GET",
                url: "bali_edit.php?date="+date,
                data: dataString,
                cache: false,
                success: function (data) {

                    modal.find('.content-here').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    });
       $('#bankModalEdit').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var key = button.data('namekey') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + key;
          var date = searchParams.get('date');
            $.ajax({
                type: "GET",
                url: "banks_edit.php?date="+date,
                data: dataString,
                cache: false,
                success: function (data) {

                    modal.find('.content-here').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    });
     $('#bankModalEdit_out').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var key = button.data('namekey') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + key;
          var date = searchParams.get('date');
            $.ajax({
                type: "GET",
                url: "banks_edit_out.php?date="+date,
                data: dataString,
                cache: false,
                success: function (data) {

                    modal.find('.content-here').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    });
    $('#stocksModalEdit').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var key = button.data('namekey') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + key;
          var date = searchParams.get('date');
            $.ajax({
                type: "GET",
                url: "stocks_edit.php?date="+date,
                data: dataString,
                cache: false,
                success: function (data) {

                    modal.find('.content-here').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    });

    $('#accountEdit').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var key = button.data('namekey') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + key;
            $.ajax({
                type: "GET",
                url: "accounts_edit.php",
                data: dataString,
                cache: false,
                success: function (data) {

                    modal.find('.content-here').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    });
    $('#employeeEdit').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var key = button.data('namekey') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + key;
            $.ajax({
                type: "GET",
                url: "employee_edit.php",
                data: dataString,
                cache: false,
                success: function (data) {

                    modal.find('.content-here').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    });

})(jQuery);
