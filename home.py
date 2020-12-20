from kivy.app import App
from kivymd.app import MDApp
from kivy.uix.boxlayout import BoxLayout
from kivymd.uix.boxlayout import MDBoxLayout
from kivy.properties import ObjectProperty
from kivy.lang import Builder
import urllib.request, json
from kivy.uix.screenmanager import Screen, ScreenManager

def cekLogin(username, password):
    with urllib.request.urlopen("http://localhost/lat/api.php?auth=888&perintah=loginmhs&Username="+username+"&Password="+password) as json_url:
        data = json.loads(json_url.read())
        #print(data)
        #print(json.dumps(data, indent=3, sort_keys=True))
        #print("isi data=" +username +", " +password)
        usernameTabel = data[0]["username"]
        passwordTabel = data[0]["password"]

        if username==usernameTabel and password==passwordTabel:
            print("Login Berhasil")
            data=1
        else:
            print("login gagal")
            data=0

    return data
	
def SaveSignUp(username, password):
    print("simpan "+username)
    print("simpan "+password)
    return 0

class LoginScreen(Screen):
	"""docstring for LoginScreen"""
	def doLogin(self):
		#print("Halooo")
		#self.txtPassword_.text="halo"
		cekLogin(self.txtUsername_.text,self.txtPassword_.text) #cek isi dari txtUsername_ dan txtPassword_

class SignupScreen(Screen):
	def doSavesignUp(self):
        SaveSignUp(self.txtUsername_SU.text, self.txtPassword_SU.text)

class HomeScreen(Screen):
	pass

#sm = ScreenManager()
#sm.add_widget(LoginScreen(name='ScreenLogin'))
#sm.add_widget(SignupScreen(name='ScreenSignup'))
#sm.add_widget(HomeScreen(name='ScreenHome'))

class MylayoutApp(MDApp):
	pass
if __name__ == '__main__':
	def build(self):
		self.theme_cls.primary_palette = "Blue"
		#screen = Builder.load_string(MylayoutForm)
		#return screen
MylayoutApp().run()