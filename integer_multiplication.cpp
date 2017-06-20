/*
 * 大整数乘法
 */
#include <string>
#include <vector>
#include <iostream>

using namespace std;

string mulitpy(string num1, string num2){
    int l1=num1.size(), l2=num2.size();
	vector<int> result(l1+l2, 0);
    int i_n1=0, i_n2=0;
	for(int i=l1-1; i>=0; i--){
        int n1 = num1[i] - '0';
        int c = 0;
        i_n2 = 0;
        for(int j=l2-1; j>=0; j--){
            int n2 = num2[j] - '0';
            int sum = n1*n2 + result[i_n1+i_n2] + c;
            c = sum/10;
            result[i_n1+i_n2] = sum%10;
            i_n2++;
        }
        if(c>0){
            result[i_n1+i_n2] = c;
        }
        i_n1++;
    }
    
    int i = result.size()-1;
    while (i>=0 && result[i] == 0) i--;

    // if all were '0's - means either both or one of num1 or num2 were '0'
    if(i == -1) return "0";

    string s = "";
    while (i >= 0) s += std::to_string(result[i--]);
    return s;
}

int main(){
	string num1, num2;
	cin>>num1>>num2;
	cout<<mulitpy(num1, num2)<<endl;
	
}