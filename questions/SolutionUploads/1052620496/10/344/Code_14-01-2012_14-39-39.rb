input_file = File.open("SampleInput.txt", "r")
input_text_original = input_file.gets();
input_file.close;
#puts input_text_original;
input_text = input_text_original.clone;
input_text.gsub!(",", " ");
input_text.gsub!(".", " ");
input_text.gsub!(":", " ");
input_text.gsub!(";", " ");
input_text.gsub!("'", " ");
max_count = 0;
the_word = "";
words = input_text.split(" ");
#puts input_text;
#puts input_text_original;
words.each do |word|
	word_count = words.count(word);
	#puts word+" "+word_count.to_s;
	if (word_count>max_count)
		max_count = word_count;
		the_word = word.clone;
	end
end
#puts "The word and count: "+max_count.to_s+" "+the_word;
output_text = input_text_original.clone;

output_text.gsub!(the_word+" ", the_word.reverse+" ");
output_text.gsub!(the_word+",", the_word.reverse+",");
output_text.gsub!(the_word+".", the_word.reverse+".");
output_text.gsub!(the_word+":", the_word.reverse+":");
output_text.gsub!(the_word+";", the_word.reverse+";");
output_text.gsub!(the_word+"'", the_word.reverse+"'");
output_file = File.open("out.txt", "w");
output_file.print output_text;
output_file.close;




