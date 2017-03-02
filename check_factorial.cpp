/*
 *
 * 给定n, 求各位阶乘和，并判断和n是否相等
 * 按照给定的格式打印
 */
#include <iostream>
#include <string>

using namespace std;

int fac(int n){
	if(n == 0){
		return 1;
	}
	return n * fac(n-1);
}

void check(int n){
	int sum = 0, d, old = n;
	if(n <= 0){
		return;
	}
	cout<<n<<", ";
	while(n){
		d = n % 10;
		if(n >= 10){
			cout<<d<<"!"<<"+";
		}else{
			cout<<d<<"!="<<old<<endl;
		}
		sum += fac(d);
		n = n / 10;
	}
	if(sum == old){
		cout<<"Yes"<<endl;
	}else{
		cout<<"No"<<endl;
	}
}

int main(){
	int n;
	cin>>n;
	check(n);
}
