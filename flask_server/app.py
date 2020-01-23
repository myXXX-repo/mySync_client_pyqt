from flask import Flask
from flask import render_template
from flask import url_for
from flask import redirect
from flask import request
from flask import abort
import json

app = Flask(__name__)


# re_define error page
@app.errorhandler(400)
def error_400(e):
    errorcode = 400
    return render_template('error_page.html', error_code=errorcode, error_msg="BadRequest"), errorcode


@app.errorhandler(401)
def error_401(e):
    errorcode = 401
    return render_template('error_page.html', error_code=errorcode, error_msg="Unauthorized"), errorcode


@app.errorhandler(403)
def error_403(e):
    errorcode = 403
    return render_template('error_page.html', error_code=errorcode, error_msg="Forbidden"), errorcode


@app.errorhandler(404)
def error_404(e):
    errorcode = 404
    return render_template('error_page.html', error_code=errorcode, error_msg="NotFound"), errorcode


@app.errorhandler(405)
def error_405(e):
    errorcode = 405
    return render_template('error_page.html', error_code=errorcode, error_msg="MethodNotAllowed"), errorcode


@app.errorhandler(406)
def error_406(e):
    errorcode = 406
    return render_template('error_page.html', error_code=errorcode, error_msg="NotAcceptable"), errorcode


@app.errorhandler(408)
def error_408(e):
    errorcode = 408
    return render_template('error_page.html', error_code=errorcode, error_msg="RequestTimeout"), errorcode


@app.errorhandler(409)
def error_409(e):
    errorcode = 409
    return render_template('error_page.html', error_code=errorcode, error_msg="Conflict"), errorcode


@app.errorhandler(410)
def error_410(e):
    errorcode = 410
    return render_template('error_page.html', error_code=errorcode, error_msg="Gone"), errorcode


@app.errorhandler(411)
def error_411(e):
    errorcode = 411
    return render_template('error_page.html', error_code=errorcode, error_msg="LengthRequired"), errorcode


@app.errorhandler(412)
def error_412(e):
    errorcode = 412
    return render_template('error_page.html', error_code=errorcode, error_msg="InternalServerError"), errorcode


@app.errorhandler(413)
def error_413(e):
    errorcode = 413
    return render_template('error_page.html', error_code=errorcode, error_msg="RequestEntityTooLarge"), errorcode


@app.errorhandler(414)
def error_414(e):
    errorcode = 414
    return render_template('error_page.html', error_code=errorcode, error_msg="RequestURITooLarge"), errorcode


@app.errorhandler(416)
def error_416(e):
    errorcode = 416
    return render_template('error_page.html', error_code=errorcode, error_msg="RequestedRangeNotSatisfiable"), errorcode


@app.errorhandler(417)
def error_417(e):
    errorcode = 417
    return render_template('error_page.html', error_code=errorcode, error_msg="ExpectationFailed"), errorcode


@app.errorhandler(500)
def error_500(e):
    errorcode = 500
    return render_template('error_page.html', error_code=errorcode, error_msg="InternalServerError"), errorcode


@app.errorhandler(501)
def error_501(e):
    errorcode = 501
    return render_template('error_page.html', error_code=errorcode, error_msg="NotImplemented"), errorcode


@app.errorhandler(502)
def error_502(e):
    errorcode = 502
    return render_template('error_page.html', error_code=errorcode, error_msg="BadGateway"), errorcode


@app.errorhandler(503)
def error_503(e):
    errorcode = 503
    return render_template('error_page.html', error_code=errorcode, error_msg="ServiceUnavailable"), errorcode


@app.errorhandler(504)
def error_504(e):
    errorcode = 504
    return render_template('error_page.html', error_code=errorcode, error_msg="GatewayTimeout"), errorcode


@app.errorhandler(505)
def error_505(e):
    errorcode = 505
    return render_template('error_page.html', error_code=errorcode, error_msg="HTTPVersionNotSupported"), errorcode


# re_define route

@app.route('/')
def index():
    return render_template('index.html', title1="mySync", title2="index")

# app_sticky
@app.route('/v2/sticky', methods=['GET'])
def sticky_index():
    return render_template('index_sticky.html',title1="Sticky",title2="index")


@app.route('/v2/sticky/get', methods=['GET', 'POST'])
def sticky_get():
    return abort(404)


@app.route('/v2/sticky/add', methods=['GET', 'POST'])
def sticky_add():
    return abort(404)


@app.route('/v2/sticky/del', methods=['GET', 'POST'])
def sticky_del():
    return abort(404)

# app_tabSync
@app.route('/v2/tabSync', methods=['GET'])
def tabSync_index():
    return abort(404)


@app.route('/v2/tabSync/get', methods=['GET', 'POST'])
def tabSync_get():
    return abort(404)


@app.route('/v2/tabSync/add', methods=['GET', 'POST'])
def tabSync_add():
    return abort(404)


@app.route('/v2/tabSync/del', methods=['GET', 'POST'])
def tabSync_del():
    return abort(404)

# app_toDoList
@app.route('/v2/toDoList', methods=['GET'])
def toDoList_index():
    return abort(404)


@app.route('/v2/toDoList/get', methods=['GET', 'POST'])
def toDoList_get():
    return abort(404)


@app.route('/v2/toDoList/add', methods=['GET', 'POST'])
def toDoList_add():
    return abort(404)


@app.route('/v2/toDoList/del', methods=['GET', 'POST'])
def toDoList_del():
    return abort(404)


@app.route('/condfig', methods=['GET'])
def config():
    return abort(404)


@app.route('/test', methods=['GET'])
def test():
    # return render_template("temp copy.html",error_code="404",error_msg="NotFound")
    return abort(404)


@app.route('/test/errorpage/<error_code>')
def rest_error_page(error_code):
    return abort(int(error_code))


if __name__ == "__main__":
    app.run(debug=True, threaded=True)
