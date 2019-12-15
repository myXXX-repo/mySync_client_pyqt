$(document).ready(function () {

    //init data when document load finish
    $.post('requestHolder.php/getAll', {}, function (data, status) {

      data = JSON.parse(data);
      console.log(data);
      data_sticky = data.operate_response;
      if (data_sticky == null) {// stop function if response data is null
        return;
      }

      //add data item from array to table
      for (var i = data_sticky.length - 1; i >= 0; i--) {

        var tr = document.createElement('tr');

        //id
        var td_id = document.createElement('td');
        td_id.setAttribute('class', 'id');
        td_id.appendChild(document.createTextNode(i));
        tr.appendChild(td_id);

        //add title sticky ... to td
        for (var j = 0; j < 6; j++) {
          var td = document.createElement('td');
          td.appendChild(document.createTextNode(data_sticky[i][j]));
          tr.appendChild(td);
        }

        //add an opt btn (del btn)
        //td_opt = document.createElement('td');
        var del_btn = document.createElement('button');
        del_btn.setAttribute('class', 'del');//set btn class name to del
        del_btn.appendChild(document.createTextNode('del'));
        //td_opt.appendChild(del_btn);
        tr.appendChild(del_btn);

        //append tr to table
        $('#sticky_list').append(tr);
      }//for

      $('.del').click(function () {
        // delClick();
        var id = $(this).prevAll('.id').text();

        //tmmp
        $.post('requestHolder.php/delById', { 'id': id }, function (data, status) {
          console.log(status);
          data = JSON.parse(data);
          console.log(data);
          if (status == 'success') {
            location.reload();
          }
          else {
            location.reload();
          }
        });
      });//del click
    });



    //set submit btn onclick operate
    //get val form input, send request, add new data to table
    $('#submit').click(function () {
      //get data from imput panl
      var title = $('#title').val();
      var sticky = $('#sticky').val();
      var author = $('#author').val();
      var reciver = $('#reciver').val();
      var curser;
      if(title==''||sticky==''||author==''||reciver==''){
        alert()
        return;
      }
      //send post request
      $.post('requestHolder.php/addToEnd', { 'title': title, 'sticky': sticky, 'author': author, 'reciver': reciver }, function (data, status) {
        data = JSON.parse(data)//resolve json string to array
        console.log(data);//log

        //get data from response body
        data_sticky = data.operate_response;

        //create a tr for data table
        var tr = document.createElement('tr');

        var td_id = document.createElement('td');

        //get id from 0
        var id = $('#list_title').nextAll().length;
        id = new Number(id);
        td_id.appendChild(document.createTextNode(id));
        td_id.setAttribute('class', 'id');
        tr.appendChild(td_id);

        //add all things to the tr
        for (var i = 0; i < 6; i++) {
          var td = document.createElement('td');
          td.appendChild(document.createTextNode(data_sticky[i]));
          tr.appendChild(td);
        }

        //create a del button
        //var td_del = document.createElement('td');
        var del_btn = document.createElement('button');
        del_btn.setAttribute('class', 'del');//set class name
        del_btn.appendChild(document.createTextNode('del'));
        //td_del.appendChild(del_btn);
        tr.appendChild(del_btn);

        //append tr to the table
        $('#list_title').after(tr);

        $('.del').click(function () {
          // delClick();
          var id = $(this).prevAll('.id').text();

          //tmmp
          $.post('requestHolder.php/delById', { 'id': id }, function (data, status) {
            console.log(status);
            data = JSON.parse(data);
            console.log(data);
            if (status == 'success') {
              location.reload();
            }
            else {
              location.reload();
            }
          });
        });//del click
      });
    });

    $('#clear').click(function () {
      $.post('requestHolder.php/clear', {}, function (data, status) {
        if (status == 'success') {
          data = JSON.parse(data);
          if (data.operate_response == 'clear') {
            $('#list_title').nextAll().remove();
          }
        }
      });
    });
  });


  //TODO to complate this
  var rebuildId = function () {
    var list = $('.id').text();
    var temp = $('sticky_list').children()[0];
    var length = $('sticky_list').children()[0].children()[0].nextAll().length;
    for (var i = length - 1; i > -1; i--) {
      temp = temp.next();
      temp.text(i);
    }
  }