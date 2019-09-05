# **mySync**
One CrossPlantform data sync framework, witch face to background

Run with php to sync data upown devices



----
## **Introduction:**
This is a plugins-support data sync framework

There are two internal plugins, sticky and filesHost

However the framework is in low built level, I will upgrade it latter 

### **user guide -- framework usage**

***NULL***

### **user guide -- plugin usage**

Your client should send data with post method, pluginId and more will be used by the plugins, the framework need the pluginId to judge witch one shuld required.

#### **sticky** 

This plugin used to store some short text on the server space, and share accross the devices with web\app\script and more method.

*sticky usage:*

send post['pluginId'] ['option'] ['devname'] [sticky]

and the program will add time to data save section

#### **fileHost**

This plugin just sits on depending level

