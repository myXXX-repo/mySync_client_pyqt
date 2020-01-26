import json
from os import path
import sqlite3


class FileCtrl: # ctrl file
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


class SqliteDBHelper: # ctrl sqlitedb
    def __init__(self, dbpath):
        self.dbpath = dbpath

    def createTable(self, sql_table_create):
        with sqlite3.connect(self.dbpath) as dbconn:
            c = dbconn.cursor()
            c.execute(sql_table_create)
            dbconn.commit()

    def delData_byid(self, tableName, id):
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


class JsonFileCtrl: # ctrl json file
    def __init__(self, filePath):
        self.filePath = filePath
        self.filefd = FileCtrl(filePath)

    def write_json_to_file(self, json_data):
        self.filefd.write_cover(json_data)

    def read_json_from_file(self, AUTOCREATE=0):
        return self.filefd.read(AUTOCREATE)


class JsonDataCtrl: # write json data to .json or .db
    def __init__(self, jsonFilePath, jsonFileAUTOCREATE=0):
        self.jsonFilePath = jsonFilePath
        self.jsonFileCtrl = JsonFileCtrl(jsonFilePath)
        self.jsonData = self.jsonFileCtrl.read_json_from_file(jsonFileAUTOCREATE)
        print(self.jsonData)


if __name__ == "__main__":
    j = JsonDataCtrl('./data.json',1)
    pass
