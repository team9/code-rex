input_file = File.new("SampleInput.txt", "r")
input_text = input_file.gets();
input_file.close;
words_array = input_text.split(' ');
max_number = 0;
the_word = "";


array_no_duplicates = words_array.uniq;
array_no_duplicates.each do |word|
	if (words_array.count(word) > max_number) 
		max_number = words_array.count(word);
		the_word = word;
	end
end
input_file = File.new("SampleInput.txt", "r");
input_text_original = input_file.gets();
input_file.close;
output_text = input_text_original.gsub(the_word, the_word.reverse);
output_file = File.new("out.txt", "w");
output_file.print output_text;
output_file.close;
 