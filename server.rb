require 'sinatra'
require 'rss'
require 'open-uri'
require 'action_view'
include ActionView::Helpers::DateHelper


def last_post
  url  = "http://nacin.com/feed/?#{Time.now.to_i}"
  rss  = open(url).read
  feed = RSS::Parser.parse(rss)
  feed.items.first
end

def timestamp
  feed.items.first.date
end

puts

get "/" do
  erb :index, :locals => { :relative_time => time_ago_in_words(last_post.date), :link => last_post.link }
end
