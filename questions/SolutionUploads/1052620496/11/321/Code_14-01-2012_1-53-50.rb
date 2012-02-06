input_file = File.new("SampleInput.txt", "r")
output_file = File.new("out.txt", "w");
input_text = input_file.gets();
palindrome = "";
words_array = input_text.split(' ');

words_array.each do |word|
   if (word == word.reverse) 
      if (word.length > palindrome.length) 
         palindrome = word;
      end
   end
end
output_file.puts(palindrome);
input_file.close;
output_file.close;
 