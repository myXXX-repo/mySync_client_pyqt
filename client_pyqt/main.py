from mainwindow import Ui_MainWindow
import sys
import requests
import demjson
from PyQt5 import *
from PyQt5.QtGui import QIcon
from PyQt5.QtCore import *
from PyQt5.QtWidgets import QAction, QApplication, QMainWindow, qApp, QMessageBox
from mainwindow import Ui_MainWindow


def getServAddress():
    return "http://127.0.0.1/GitHub/tabSync_chrome_extension/php/requestHolder.php"


def getServAddress_getAllTabs():
    return getServAddress()+'/getAllTabs'


def getServAddress_getLastTab():
    return getServAddress()+'/getLastTab'


def getServAddress_sendTabs():
    return getServAddress()+'/addTabs'


def getServAddress_sendTab():
    return getServAddress()+'/addOneTab'


def getServAddress_clearAllTabs():
    return getServAddress()+'/clearTabs'


def getServAddress_delOneTab():
    return getServAddress()+'/delOneTab'


def getDevname():
    return 'WolfSurface'


def getkey():

    return 'asdf'


def jsonDecode(string):
    return demjson.decode(string)


def jsonEncode(array):
    return demjson.encode(array)


def createDataBody(jsondatastr=''):
    if jsondatastr == '':
        return {
            'devname': getDevname(),
            'key': getkey()
        }
    else:
        return {
            'devname': getDevname(),
            'key': getkey(),
            'data': jsondatastr
        }


def sendRequest(url, data):
    response = requests.post(url, data)
    response = response.text
    return response


def getAllTabs():
    response = sendRequest(getServAddress_getAllTabs(), createDataBody())
    return response


def getLastTab():
    response = sendRequest(getServAddress_getLastTab(), createDataBody())
    return response


def clearTabs():
    response = sendRequest(getServAddress_clearAllTabs(), createDataBody())
    return response


def sendTab(datajsonstr):
    response = sendRequest(getServAddress_sendTab(),
                           createDataBody(datajsonstr))
    return response


def sendTabs(datajsonstr):
    response = sendRequest(getServAddress_sendTabs(),
                           createDataBody(datajsonstr))
    return response


def menu():
    print('1.getLastTab')
    print('2.getAllTabs')
    print('3.sendOneTab')
    print('4.exit')
    allowedchoise = ['1', '2', '3', '4']
    num = input('choose operate:')
    if num in allowedchoise:
        return num
    else:
        print('error: input 1~4:')
        return menu()


def example():
    LIST = []
    node = [
        'this is a title',
        'http://www.google.com'
    ]
    LIST.append(node)
    LIST.append(node)
    print(jsonDecode(getAllTabs())['operate_response'])
    print(jsonDecode(getLastTab())['operate_response'])
    print(jsonDecode(clearTabs())['operate_response'])
    print(jsonDecode(sendTab(jsonEncode(node)))['operate_response'])
    print(jsonDecode(sendTabs(jsonEncode(LIST)))['operate_response'])


class MainWindow(Ui_MainWindow, QMainWindow):
    def __init__(self):
        super().__init__()
        self.setupUi(self)
        self.button_send_tab.clicked.connect(self.sendTabDataFromInput)
        self.button_clear.clicked.connect(self.clearLineEdit)
        self.button_delAllTabs.clicked.connect(self.delAllTabs)
        self.button_refresh.clicked.connect(self.createList)
        self.button_settings.clicked.connect(self.settings)
        self.setWindowTitle('tabsSync')
        self.setWindowIcon(QIcon('tabs_564px_1154010_easyicon.net.png'))
        self.createList()

    def settings(self):
        pass

    def createList(self):
        tabaDataArray = jsonDecode(getAllTabs())['operate_response']
        print(tabaDataArray)
        if tabaDataArray == None:
            slm = QStringListModel()
            slm.setStringList([])
            self.listView.setModel(slm)
            print('getBlankOfDataBody')
            return
        datalist = []
        for node in tabaDataArray:
            datalist.append('title:'+node[0])
            datalist.append('url:'+node[1])
        # self.listView.setViewMode(QListView.ListMode)
        slm = QStringListModel()
        slm.setStringList(datalist)
        self.listView.setModel(slm)

        pass
        # TODO add new code to create list

    def delAllTabs(self):
        if jsonDecode(clearTabs())['operate_response'] == 'clearTabs':
            print('delAllTabs')
            self.createList()
        else:
            QMessageBox.question(
                self, 'error', 'failed to delAllTabs', QMessageBox.Cancel, QMessageBox.Cancel)

    def clearLineEdit(self):
        self.lineedit_title.setText('')
        self.lineedit_url.setText('')
        print('debug: log clear lineedit')

    def sendTabDataFromInput(self):
        tabdata = self.getTabDataFromInput()
        if tabdata != []:
            print(tabdata)
            if jsonDecode(sendTab(jsonEncode(tabdata)))['operate_response'] != 'addOneTab':
                QMessageBox.question(
                    self, 'error', 'failed to send data', QMessageBox.Cancel, QMessageBox.Cancel)
            else:
                print('send one tab done')
        self.createList()

    def getTabDataFromInput(self):
        tabdata = []
        title = self.lineedit_title.text()
        if title == '':
            error_input_dialog = QMessageBox.question(
                self, 'error', 'please check your input of title!', QMessageBox.Cancel, QMessageBox.Cancel)
            print('error: please check your input of title')
            return []
        url = self.lineedit_url.text()
        if title == '':
            error_input_dialog = QMessageBox.question(
                self, 'error', 'please check your input of url!', QMessageBox.Cancel, QMessageBox.Cancel)
            print('error: please check your input of url')
            return []
        tabdata.append(title)
        tabdata.append(url)
        return tabdata


if __name__ == '__main__':
    app = QtWidgets.QApplication(sys.argv)
    # example()
    mw = MainWindow()
    mw.show()
    sys.exit(app.exec_())
