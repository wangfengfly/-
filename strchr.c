#include <iostream>
#include <cstring>
#include <cstdlib>

using namespace std;

char* strchr(const char* str, char _Val){
	if(str == NULL){
		return NULL;
	}
	int i = 0;
	while(*(str+i) != '\0'){
		if(_Val == *(str + i)){
			return (char*)(str + i);
		}
		i++;
	}	
	return NULL;
}
/*
 * the function below is more simple, 
 * https://opensource.apple.com/source/Libc/Libc-167/string.subproj/strchr.c
 */
char* _strchr(const char* s, char c){
	const char ch = c;
	for(; *s != ch; s++){
		if(*s == '\0')
			return NULL;
	}
	return (char*)s;
}

int main(){
	string str;
	cin>>str;
       	const char* _Str = str.c_str();
	char* p = _strchr(_Str, 'o');
	while(*p!='\0'){
		cout<<*p;
		p++;
	}
}
