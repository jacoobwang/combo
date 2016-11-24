## Php compress js and css files

php实现js和css文件合并及压缩，类似于gulp grant之类的工具

使用方法参考test文件夹

css合并使用file_get_contents读出字符，去掉空格及换行符

js合并采用了国外大牛写的一个js压缩类，支持4种格式压缩

参考http://dean.edwards.name/packer/usage/

更多信息访问个人博客 http://www.loadphp.cn/