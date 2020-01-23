import json
from os import path
import sqlite3


class FileCtrl:
    def __init__(self, filePath):
        self.filePath = filePath

    def write_append(self, str):
        with open(self.filePath, 'a') as filefd:
            filefd.write(str+'\n')

    def write_cover(self, str):
        with open(self.filePath, 'w') as filefd:
            filefd.write(str)

    def read(self, AUTOCREATE=0):
        data_to_return = ""
        if path.isfile(self.filePath):
            # if file exists
            # read file and return data
            with open(self.filePath, 'r') as filefd:
                data_to_return = filefd.read()
        else:
            # if file not exists
            if AUTOCREATE == 1:
                with open(self.filePath, 'w') as filefd:
                    filefd.write("")
                pass
        return data_to_return


class SqliteDBHelper:
    def __init__(self, dbpath):
        self.dbpath = dbpath

    def createTable(self, sql_table_create):
        with sqlite3.connect(self.dbpath) as dbconn:
            c = dbconn.cursor()
            c.execute(sql_table_create)
            dbconn.commit()

    def delData_byid(self,tableName,id):
        with sqlite3.connect(self.dbpath) as dbconn:
            c = dbconn.cursor()
            c.execute()
            dbconn.commit()

    def exec(self, sql, data=()):
        result = ""
        with sqlite3.connect(self.dbpath) as dbconn:
            c = dbconn.cursor()
            c.execute(sql, data)
            result = c.fetchall()
            dbconn.commit()
        return result


class JsonFileCtrl:
    def __init__(self, filePath):
        self.filePath = filePath
        self.filefd = FileCtrl(filePath)

    def write_json_to_file(self, json_data):
        self.filefd.write_cover(json_data)

    def read_json_from_file(self, AUTOCREATE=0):
        return self.filefd.read(AUTOCREATE)


class JsonDataCtrl:
    def __init__(self, jsonFilePath, AUTOCREATE=0):
        self.jsonFilePath = jsonFilePath
        self.jsonFileCtrl = JsonFileCtrl(jsonFilePath)
        self.jsonData = self.jsonFileCtrl.read_json_from_file(AUTOCREATE)
        print(self.jsonData)


if __name__ == "__main__":

    # a = ['a','b','v']
    # jsonData = json.dumps(a,ensure_ascii=0)
    # jsonDataCtrl = JsonDataCtrl('data.json')
    sqliteDBHelper = SqliteDBHelper('./data.sql')
    # sqliteDBHelper.exec('''
    # CREATE TABLE "" net exist (id INTEGER PRIMARY KEY AUTOINCREMENT,name VARCHAR (1024));
    # ''')
    # sqliteDBHelper.exec('insert into "aaa" values(?,?);',(None,'12'))
    sqliteDBHelper.exec('delete from "aaa" where id=? and name = 15;',("12",))
    # print(sqliteDBHelper.exec('select * from "aaa";'))