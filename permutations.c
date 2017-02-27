/*
 * 给出字符串的全排列
 * 时间复杂度O(n*n!)
 */
#include <stdio.h>
#include <string.h>

void swap(char* a, char* b){
	char temp = *a;
	*a = *b;
	*b = temp;
}

void com(char* p, int start, int end){
	if(start == end){
		printf("%s\n", p);
	}
	else{
        for(int i = start; i <= end; i++){
            swap(p+start, p+i);
            com(p, start+1, end);
            swap(p+start, p+i);
        }
	}
}	

int main(){
	char str[] = "ABC";
	int len = strlen(str);
    com(str, 0, len-1);	
}
