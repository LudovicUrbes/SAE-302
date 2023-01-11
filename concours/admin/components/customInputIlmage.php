<!-- This is an HTML code snippet that allows the user to select a file from their device and upload it to a web page. Finally, the paragraph element below the input indicating the accepted file formats. -->
<label class="block w-fit">
  <span class="sr-only">Choississez votre image</span>
  <input type="file" name="image" id="image" accept=".png,.jpeg,.jpg" class="text-sm text-slate-500
      file:mr-4 file:py-2 file:px-4
      file:rounded-full file:border-0
      file:text-sm file:font-semibold
      file:bg-teal-200 file:text-teal-700
      hover:file:bg-teal-300
    " />
  <p class="font-thin text-gray-400 text-xs ml-5">Formats acceptés : JPEG, JPG, PNG</p>
</label>