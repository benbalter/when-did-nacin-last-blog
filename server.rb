require 'sinatra'
require 'rss'
require 'open-uri'
require 'action_view'
include ActionView::Helpers::DateHelper

get "/" do
  url  = "http://nacin.com/feed/?#{Time.now.to_i}"
  rss  = open(url).read
  feed = RSS::Parser.parse(rss)
  last_post = feed.items.first
  erb :index, :locals => { :relative_time => time_ago_in_words(last_post.date), :link => last_post.link }
end
