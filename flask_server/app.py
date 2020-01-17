from flask import Flask, render_template, redirect, url_for, abort
app = Flask(__name__)

sticky_list = {0: {'title': 'sticky_title1', 'con': 'sticky_con1'}, 1: {
    'title': 'sticky_title2', 'con': 'sticky_con2'}}


@app.route("/", methods=['GET', 'HEAD'])
def index():
    return render_template('index.html')

@app.route('/v2/sticky',methods=['GET'])
def Sticky_index():
    return render_template('Sticky_index.html')

@app.route('/v2/sticky/get', methods=['GET','POST'])
def getSticky():
    return sticky_list[0]


@app.route('/v2/sticky/add', methods=['GET','POST'])
def getStickies():
    return sticky_list


@app.route('/v2/sticky/del', methods=['GET','POST'])
def test():
    return sticky_list

@app.route('/v2/statistics',methods=['GET'])
def visite_statistics():
    statistics = {}
    return statistics

@app.route('/v2/statistics/reset',methods=['GET,POST'])
def reset_statistics():
    return "1"


# @app.route('/<argv1>')
# @app.route('/<argv1>/')
# def gotoroot(argv1):
#     return redirect(url_for('root'))

# @app.route('/<api_version>/<app>',methods=['POST','GET'])
# @app.route('/<api_version>/<app>/',methods=['POST','GET'])
# def gotoroot1(argv1,argv2):
#     return redirect(url_for('root'))

# @app.route('/<api_version>/<app>/<operate>')
# def version_switcher(api_version,app,operate):
#     data_output=""
#     if api_version=='v2':
#         data_output = v2_app_switcher(app,operate)
#         return str(data_output)
#     else:
#         return abort(404)

if __name__ == '__main__':
    app.run(debug=True,threaded=True)
