# -*- coding: utf-8 -*-

# Form implementation generated from reading ui file '.\mainwindow.ui'
#
# Created by: PyQt5 UI code generator 5.13.2
#
# WARNING! All changes made in this file will be lost!


from PyQt5 import QtCore, QtGui, QtWidgets


class Ui_MainWindow(object):
    def setupUi(self, MainWindow):
        MainWindow.setObjectName("MainWindow")
        MainWindow.resize(479, 467)
        self.centralwidget = QtWidgets.QWidget(MainWindow)
        self.centralwidget.setObjectName("centralwidget")
        self.listView = QtWidgets.QListView(self.centralwidget)
        self.listView.setGeometry(QtCore.QRect(10, 140, 461, 311))
        self.listView.setObjectName("listView")
        self.groupBox = QtWidgets.QGroupBox(self.centralwidget)
        self.groupBox.setGeometry(QtCore.QRect(10, 10, 351, 121))
        self.groupBox.setObjectName("groupBox")
        self.label_title = QtWidgets.QLabel(self.groupBox)
        self.label_title.setGeometry(QtCore.QRect(10, 30, 51, 31))
        self.label_title.setObjectName("label_title")
        self.lineedit_title = QtWidgets.QLineEdit(self.groupBox)
        self.lineedit_title.setGeometry(QtCore.QRect(60, 30, 171, 31))
        self.lineedit_title.setObjectName("lineedit_title")
        self.label_url = QtWidgets.QLabel(self.groupBox)
        self.label_url.setGeometry(QtCore.QRect(10, 70, 51, 31))
        self.label_url.setObjectName("label_url")
        self.lineedit_url = QtWidgets.QLineEdit(self.groupBox)
        self.lineedit_url.setGeometry(QtCore.QRect(60, 70, 171, 31))
        self.lineedit_url.setObjectName("lineedit_url")
        self.button_send_tab = QtWidgets.QPushButton(self.groupBox)
        self.button_send_tab.setGeometry(QtCore.QRect(240, 30, 91, 31))
        self.button_send_tab.setObjectName("button_send_tab")
        self.button_clear = QtWidgets.QPushButton(self.groupBox)
        self.button_clear.setGeometry(QtCore.QRect(240, 70, 91, 31))
        self.button_clear.setObjectName("button_clear")
        self.button_delAllTabs = QtWidgets.QPushButton(self.centralwidget)
        self.button_delAllTabs.setGeometry(QtCore.QRect(369, 20, 101, 31))
        self.button_delAllTabs.setObjectName("button_delAllTabs")
        self.button_refresh = QtWidgets.QPushButton(self.centralwidget)
        self.button_refresh.setGeometry(QtCore.QRect(370, 60, 101, 31))
        self.button_refresh.setObjectName("button_refresh")
        self.button_settings = QtWidgets.QPushButton(self.centralwidget)
        self.button_settings.setGeometry(QtCore.QRect(370, 100, 101, 31))
        self.button_settings.setObjectName("button_settings")
        MainWindow.setCentralWidget(self.centralwidget)
        self.actionsettings = QtWidgets.QAction(MainWindow)
        self.actionsettings.setObjectName("actionsettings")
        self.actionexit = QtWidgets.QAction(MainWindow)
        self.actionexit.setObjectName("actionexit")

        self.retranslateUi(MainWindow)
        QtCore.QMetaObject.connectSlotsByName(MainWindow)

    def retranslateUi(self, MainWindow):
        _translate = QtCore.QCoreApplication.translate
        MainWindow.setWindowTitle(_translate("MainWindow", "MainWindow"))
        self.groupBox.setTitle(_translate("MainWindow", "tab"))
        self.label_title.setText(_translate("MainWindow", "title"))
        self.label_url.setText(_translate("MainWindow", "url"))
        self.button_send_tab.setText(_translate("MainWindow", "send"))
        self.button_clear.setText(_translate("MainWindow", "clear"))
        self.button_delAllTabs.setText(_translate("MainWindow", "delAllTabs"))
        self.button_refresh.setText(_translate("MainWindow", "reFresh"))
        self.button_settings.setText(_translate("MainWindow", "settings"))
        self.actionsettings.setText(_translate("MainWindow", "settings"))
        self.actionexit.setText(_translate("MainWindow", "exit"))
