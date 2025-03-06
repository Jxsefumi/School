
3:47 PM
Bugarin
Bugarin Gelloiz
#include <iostream>
#include <vector>
#include <math.h>
#include <string>
#include <map>
using namespace std;

int main() {
	cout << "==============================" << endl;
	cout << "||Marc Gelloiz DG. Bugarin  ||" << endl;
	cout << "||       BSCpE - 2          ||" << endl;
	cout << "||RPN Scientific Calculator ||" << endl;
	cout << "==============================" << endl;
	vector<float> stack;
	string input;
	map<string, float> store;


	while (true) {
		cin >> input;

		if (input == "+") {
			if (stack.size() > 1) {
				float a = stack.back();
				stack.pop_back();
				float b = stack.back();
				stack.pop_back();
				stack.push_back(a + b);
			}
			else {
				cout << "Nothing to Add!" << endl;
			}
		}
		else if (input == "-") {
			if (stack.size() > 1) {
				float a = stack.back();
				stack.pop_back();
				float b = stack.back();
				stack.pop_back();
				stack.push_back(b - a);
			}
			else {
				cout << "Nothing to Subtract!" << endl;
			}
		}
		else if (input == "*") {
			if (stack.size() > 1) {
				float a = stack.back();
				stack.pop_back();
				float b = stack.back();
				stack.pop_back();
				stack.push_back(b * a);
			}
			else {
				cout << "Nothing to Multiply!" << endl;
			}
		}
		else if (input == "/") {
			if (stack.size() > 1) {
				if (stack.back() != 0) {
					float a = stack.back();
					stack.pop_back();
					float b = stack.back();
					stack.pop_back();
					stack.push_back(b / a);
				} else {
					cout << "Cannot divide with 0!" << endl;
				}
			} else {
				cout << "Nothing to Divide!" << endl;
			}
		}
		else if (input == "neg") {
			if (stack.size() > 0) {
				float a = stack.back();
				stack.pop_back();
				stack.push_back(a - a * 2);
			}
			else {
				cout << "Nothing to Negate!" << endl;
			}
		}
		else if (input == "pow") {
			if (stack.size() > 1) {
				float a = stack.back();
				stack.pop_back();
				float b = stack.back();
				stack.pop_back();
				stack.push_back(pow(b, a));
			}
			else {
				cout << "Nothing to Power!" << endl;
			}
		}
		else if (input == "sqrt") {
			if (stack.size() > 0) {
				if (stack.back() > 0) {
					float a = stack.back();
					stack.pop_back();
					stack.push_back(sqrt(a));
				}
				else {
					cout << "Cannot Square root a negative number!" << endl;
				}
			}
			else {
				cout << "Nothing to Square Root!" << endl;
			}
		}
		else if (input == "swap") {
			if (stack.size() > 1) {
				float temp = stack.back();
				stack.pop_back();
				float b = stack.back();
				stack.pop_back();
				float a = temp;
				stack.push_back(a);
				stack.push_back(b);
			}
			else {
				cout << "Nothing to swap!" << endl;
			}
		}
		else if (input == "sto") {
			if (stack.size() > 0) {
				string name;
				cout << "Enter a name to store the Value." << endl;
				cin >> name;
				store = { {name, stack.back()} };
				stack.pop_back();
			}
			else {
				cout << "Nothing to Store!" << endl;
			}
		}
		else if (input == "get") {
			string name;
			cout << "What key do you want to get?" << endl;
			cin >> name;
			map<string, float>::iterator it;
			if ((it = store.find(name)) != store.end()) {
				stack.push_back(store[name]);
			}
		}
		else {
			try {
            stack.push_back(stof(input));
		} catch (invalid_argument&) {
                cout << "Error: Invalid input!" << endl;
            }
        }

		cout << "[ ";
		for (int i = 0; i < stack.size(); i++) {
			cout << stack[i] << ", ";
		}
		cout << "]" << endl;
	}
}
Write to Bugarin Gelloiz


