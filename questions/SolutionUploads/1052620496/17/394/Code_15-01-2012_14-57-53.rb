input_file = File.open("SampleInput.txt", "r")
count_number = input_file.gets().chomp;


array_alpha = Hash.new();
array_alpha['a'] = "2";
array_alpha['b'] = "22";
array_alpha['c'] = "222";
array_alpha['d'] = "3";
array_alpha['e'] = "33";
array_alpha['f'] = "333";
array_alpha['g'] = "4";
array_alpha['h'] = "44";
array_alpha['i'] = "444";
array_alpha['j'] = "5";
array_alpha['k'] = "55";
array_alpha['l'] = "555";
array_alpha['m'] = "6";
array_alpha['n'] = "66";
array_alpha['o'] = "666";
array_alpha['p'] = "7";
array_alpha['q'] = "77";
array_alpha['r'] = "777";
array_alpha['s'] = "7777";
array_alpha['t'] = "8";
array_alpha['u'] = "88";
array_alpha['v'] = "888";
array_alpha['w'] = "9";
array_alpha['x'] = "99";
array_alpha['y'] = "999";
array_alpha['z'] = "9999";
array_alpha[' '] = "0";


output_file = File.open("out.txt", "w");
j = 0;
while j < count_number.to_i do
	output_text = "";
	input_text = input_file.gets().chomp;
	output_text = array_alpha[input_text[0].downcase];
	i = 1;
	while i < input_text.length do
		letter = input_text[i];
		#puts letter;
		output_text = output_text+array_alpha[letter];
		i = i+ 1;
	end	
	j = j+ 1;

	output_file.print output_text;
	if j < count_number.to_i
		output_file.print "\n"
	end
end
input_file.close;

output_file.close;




